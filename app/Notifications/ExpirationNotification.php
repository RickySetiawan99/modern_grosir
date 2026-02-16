<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExpirationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $alertData;

    /**
     * Create a new notification instance.
     */
    public function __construct($alertData)
    {
        $this->alertData = $alertData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $message = (new MailMessage)
            ->subject('⚠️ Expiration Alert - Items Approaching Expiry')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('The following items are approaching their expiration dates:');

        // Group alerts by level
        if (isset($this->alertData['critical'])) {
            $message->line('');
            $message->line('🔴 **Critical (< 7 days)**: ' . $this->alertData['critical']->count() . ' items');
            foreach ($this->alertData['critical']->take(5) as $alert) {
                $message->line('  • ' . $alert->batch->product->name . 
                    ' (Batch: ' . $alert->batch->batch_number . ') - ' . 
                    $alert->days_until_expiry . ' days left');
            }
        }

        if (isset($this->alertData['warning'])) {
            $message->line('');
            $message->line('🟡 **Warning (7-14 days)**: ' . $this->alertData['warning']->count() . ' items');
            foreach ($this->alertData['warning']->take(3) as $alert) {
                $message->line('  • ' . $alert->batch->product->name . 
                    ' (Batch: ' . $alert->batch->batch_number . ') - ' . 
                    $alert->days_until_expiry . ' days left');
            }
        }

        if (isset($this->alertData['info'])) {
            $message->line('');
            $message->line('🟠 **Info (14-30 days)**: ' . $this->alertData['info']->count() . ' items');
        }

        $message->line('');
        $message->line('Please review these items and take appropriate action (create promotions, transfer stock, or dispose if necessary).');
        $message->action('View Batch Management', url('/admin/inventory/batches'));
        $message->line('Thank you for maintaining quality control!');

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $summary = [];
        
        foreach (['critical', 'warning', 'info'] as $level) {
            if (isset($this->alertData[$level])) {
                $summary[$level] = $this->alertData[$level]->count();
            }
        }

        return [
            'type' => 'expiration_alert',
            'message' => 'Items approaching expiration',
            'summary' => $summary,
            'timestamp' => now()->toDateTimeString(),
        ];
    }
}
