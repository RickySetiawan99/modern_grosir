<?php

namespace App\Console\Commands;

use App\Services\TierEvaluationService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EvaluateResellerTiers extends Command
{
    protected $signature = 'reseller:evaluate-tiers
                            {--period= : Evaluation period in YYYY-MM format (defaults to previous month)}
                            {--dry-run : Simulate evaluation without persisting changes}';

    protected $description = 'Evaluate reseller monthly spend and update tiers accordingly';

    public function handle(TierEvaluationService $service): int
    {
        $periodInput = $this->option('period');
        $dryRun = (bool) $this->option('dry-run');

        $periodDate = null;
        if ($periodInput) {
            if (! preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $periodInput)) {
                $this->error("Invalid period format '{$periodInput}'. Expected format: YYYY-MM (e.g. 2026-09).");
                return self::FAILURE;
            }
            $periodDate = Carbon::createFromFormat('Y-m-d', "{$periodInput}-01");
        }

        $modeLabel = $dryRun ? ' [DRY RUN / SIMULATION]' : '';
        $this->info("Starting reseller tier evaluation{$modeLabel}...");

        $summary = $service->evaluateMonthlyTiers($periodDate, $dryRun);

        $this->newLine();
        $this->table(
            ['Metric', 'Value'],
            [
                ['Evaluation Period', $summary['period']],
                ['Execution Mode', $summary['dry_run'] ? 'Dry Run (No DB Writes)' : 'Live Execution'],
                ['Total Resellers', $summary['total']],
                ['Upgraded', $summary['upgraded']],
                ['Downgraded', $summary['downgraded']],
                ['Locked (Protected)', $summary['locked']],
                ['Unchanged', $summary['unchanged']],
            ]
        );

        if (! empty($summary['details'])) {
            $this->newLine();
            $this->info('Evaluation Details:');

            $rows = array_map(function ($item) {
                return [
                    $item['reseller_id'],
                    $item['user_name'],
                    $item['old_tier'],
                    $item['new_tier'],
                    'Rp ' . number_format($item['monthly_spent'], 0, ',', '.'),
                    strtoupper($item['status']),
                    $item['is_locked'] ? 'YES' : 'NO',
                ];
            }, $summary['details']);

            $this->table(
                ['Reseller ID', 'User Name', 'Old Tier', 'New Tier', 'Monthly Spent', 'Status', 'Locked'],
                $rows
            );
        }

        $this->newLine();
        $this->info("Reseller tier evaluation completed successfully.");

        return self::SUCCESS;
    }
}
