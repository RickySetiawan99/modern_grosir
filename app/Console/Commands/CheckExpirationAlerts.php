<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\InventoryBatch;
use App\Models\ExpirationAlert;
use App\Models\User;
use App\Notifications\ExpirationNotification;
use App\Services\BatchService;
use Illuminate\Support\Facades\Notification;

class CheckExpirationAlerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expiration:check-alerts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for batches approaching expiration and generate alerts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking expiration alerts...');

        $thresholds = [
            'critical' => 7,
            'warning' => 14,
            'info' => 30,
        ];

        $alertsCreated = 0;

        foreach ($thresholds as $level => $days) {
            $batches = InventoryBatch::where('status', 'active')
                ->whereNotNull('expiration_date')
                ->where('quantity', '>', 0)
                ->whereRaw('DATEDIFF(expiration_date, CURDATE()) <= ?', [$days])
                ->whereRaw('DATEDIFF(expiration_date, CURDATE()) > ?', [
                    $level === 'critical' ? 0 : ($level === 'warning' ? 7 : 14)
                ])
                ->get();

            foreach ($batches as $batch) {
                // Check if alert already exists for today
                $existingAlert = ExpirationAlert::where('batch_id', $batch->id)
                    ->where('alert_level', $level)
                    ->whereDate('notified_at', today())
                    ->first();

                if (!$existingAlert) {
                    $alert = ExpirationAlert::create([
                        'batch_id' => $batch->id,
                        'alert_level' => $level,
                        'days_until_expiry' => $batch->days_until_expiry,
                        'notified_at' => now(),
                    ]);

                    $alertsCreated++;
                    
                    $this->line("  [{$level}] {$batch->product->name} - Batch: {$batch->batch_number} ({$batch->days_until_expiry} days left)");
                }
            }
        }

        // Mark expired batches
        $expiredCount = InventoryBatch::where('expiration_date', '<', now())
            ->where('status', 'active')
            ->update(['status' => 'expired']);

        if ($expiredCount > 0) {
            $this->error("  Marked {$expiredCount} batches as expired.");
        }

        // Auto-dispose fully expired batches (optional)
        $batchService = new BatchService();
        $disposedCount = $batchService->autoDisposeExpiredBatches();

        if ($disposedCount > 0) {
            $this->error("  Auto-disposed {$disposedCount} expired batches.");
        }

        // Send email notification to admins
        if ($alertsCreated > 0) {
            $this->sendNotifications($thresholds);
        }

        $this->info("✓ Expiration check complete. {$alertsCreated} alerts created.");

        return Command::SUCCESS;
    }

    /**
     * Send notifications to admin users
     */
    protected function sendNotifications($thresholds)
    {
        $admins = User::role('admin')->get();

        if ($admins->isEmpty()) {
            return;
        }

        // Collect alerts by level
        $alertData = [];
        foreach ($thresholds as $level => $days) {
            $alerts = ExpirationAlert::where('alert_level', $level)
                ->whereDate('notified_at', today())
                ->with('batch.product', 'batch.warehouse')
                ->get();

            if ($alerts->count() > 0) {
                $alertData[$level] = $alerts;
            }
        }

        if (!empty($alertData)) {
            Notification::send($admins, new ExpirationNotification($alertData));
            $this->info("  📧 Email notifications sent to " . $admins->count() . " admin(s).");
        }
    }
}
