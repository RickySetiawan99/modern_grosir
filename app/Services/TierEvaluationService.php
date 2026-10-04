<?php

namespace App\Services;

use App\Models\Reseller;
use App\Models\ResellerTier;
use App\Models\ResellerTierHistory;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TierEvaluationService
{
    public function calculateMonthlySpend(int $userId, Carbon $startDate, Carbon $endDate): float
    {
        return (float) Transaction::where('customer_id', $userId)
            ->where('status', 'completed')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('total_amount');
    }

    public function determineEligibleTier(float $monthlySpend, ?ResellerTier $currentTier = null, bool $isLocked = false): ResellerTier
    {
        $tiers = ResellerTier::orderByDesc('min_monthly_spend')->get();

        if ($tiers->isEmpty()) {
            throw new \RuntimeException('No reseller tiers configured in database.');
        }

        $eligibleTier = $tiers->first(fn ($tier) => $monthlySpend >= (float) $tier->min_monthly_spend) ?? $tiers->last();

        if ($isLocked && $currentTier) {
            if ((float) $eligibleTier->min_monthly_spend < (float) $currentTier->min_monthly_spend) {
                return $currentTier;
            }
        }

        return $eligibleTier;
    }

    public function evaluateMonthlyTiers(?Carbon $period = null, bool $dryRun = false): array
    {
        $evaluationPeriod = $period ? $period->copy() : now()->subMonth();
        $startDate = $evaluationPeriod->copy()->startOfMonth();
        $endDate = $evaluationPeriod->copy()->endOfMonth();
        $periodString = $evaluationPeriod->format('Y-m');

        $resellers = Reseller::with('tier', 'user')->get();

        $summary = [
            'period' => $periodString,
            'dry_run' => $dryRun,
            'total' => $resellers->count(),
            'upgraded' => 0,
            'downgraded' => 0,
            'unchanged' => 0,
            'locked' => 0,
            'details' => [],
        ];

        foreach ($resellers as $reseller) {
            $currentTier = $reseller->tier;
            $monthlySpend = $this->calculateMonthlySpend($reseller->user_id, $startDate, $endDate);
            $eligibleTier = $this->determineEligibleTier($monthlySpend, $currentTier, (bool) $reseller->is_tier_locked);

            $status = 'unchanged';
            $reason = null;

            if ($reseller->is_tier_locked && $currentTier && (float) $eligibleTier->id === (float) $currentTier->id) {
                $naturalTier = ResellerTier::orderByDesc('min_monthly_spend')
                    ->get()
                    ->first(fn ($t) => $monthlySpend >= (float) $t->min_monthly_spend) ?? ResellerTier::orderBy('min_monthly_spend')->first();

                if ($naturalTier && (float) $naturalTier->min_monthly_spend < (float) $currentTier->min_monthly_spend) {
                    $status = 'locked';
                    $summary['locked']++;
                }
            }

            if ($currentTier && $eligibleTier->id !== $currentTier->id) {
                if ((float) $eligibleTier->min_monthly_spend > (float) $currentTier->min_monthly_spend) {
                    $status = 'upgraded';
                    $reason = "Monthly Evaluation: Upgrade to {$eligibleTier->name} (Spend: Rp ".number_format($monthlySpend, 0, ',', '.').")";
                    $summary['upgraded']++;
                } else {
                    $status = 'downgraded';
                    $reason = "Monthly Evaluation: Downgrade to {$eligibleTier->name} (Spend: Rp ".number_format($monthlySpend, 0, ',', '.').")";
                    $summary['downgraded']++;
                }

                if (! $dryRun) {
                    DB::transaction(function () use ($reseller, $eligibleTier, $currentTier, $monthlySpend, $periodString, $reason) {
                        $reseller->update(['reseller_tier_id' => $eligibleTier->id]);

                        ResellerTierHistory::create([
                            'reseller_id' => $reseller->id,
                            'old_tier_id' => $currentTier->id,
                            'new_tier_id' => $eligibleTier->id,
                            'monthly_spent' => $monthlySpend,
                            'evaluation_period' => $periodString,
                            'reason' => $reason,
                        ]);
                    });
                }
            } else {
                if ($status !== 'locked') {
                    $summary['unchanged']++;
                }
            }

            $summary['details'][] = [
                'reseller_id' => $reseller->id,
                'user_name' => $reseller->user->name ?? 'N/A',
                'old_tier' => $currentTier->name ?? 'None',
                'new_tier' => $eligibleTier->name,
                'monthly_spent' => $monthlySpend,
                'status' => $status,
                'is_locked' => (bool) $reseller->is_tier_locked,
            ];
        }

        return $summary;
    }

    public function getResellerMonthlyProgress(Reseller $reseller): array
    {
        $startDate = now()->startOfMonth();
        $endDate = now();
        $monthlySpend = $this->calculateMonthlySpend($reseller->user_id, $startDate, $endDate);

        $currentTier = $reseller->tier ?? ResellerTier::orderBy('min_monthly_spend')->first();

        $nextTier = ResellerTier::where('min_monthly_spend', '>', (float) ($currentTier->min_monthly_spend ?? 0))
            ->orderBy('min_monthly_spend', 'asc')
            ->first();

        $isMaxTier = $nextTier === null;
        $targetSpend = $isMaxTier ? (float) $currentTier->min_monthly_spend : (float) $nextTier->min_monthly_spend;
        $remainingSpend = $isMaxTier ? 0.0 : max(0.0, $targetSpend - $monthlySpend);

        $progressPercentage = 100.0;
        if (! $isMaxTier && $targetSpend > 0) {
            $progressPercentage = min(100.0, round(($monthlySpend / $targetSpend) * 100, 1));
        }

        $daysRemaining = max(0, (int) now()->diffInDays(now()->endOfMonth(), false));

        return [
            'current_tier' => $currentTier,
            'next_tier' => $nextTier,
            'current_spent' => $monthlySpend,
            'target_spend' => $targetSpend,
            'remaining_spend' => $remainingSpend,
            'progress_percentage' => $progressPercentage,
            'is_max_tier' => $isMaxTier,
            'is_locked' => (bool) $reseller->is_tier_locked,
            'days_remaining' => $daysRemaining,
            'evaluation_date' => now()->addMonth()->startOfMonth()->format('d M Y'),
        ];
    }
}
