<?php
namespace Modules\AvnWebsite\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

class WebsiteErrorNotification extends Mailable
{
    public $url;
    public $statusCode;

    /**
     * Create a new notification instance.
     */
    public function __construct($url, $statusCode)
    {
        $this->url = $url;
        $this->statusCode = $statusCode;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        try {
            return (new MailMessage)
                ->subject('Website Error Notification')
                ->line('An error occurred on the website with URL: ' . $this->url)
                ->line('Status Code: ' . $this->statusCode)
                ->line('Please take necessary actions to resolve the issue.');
        } catch (\Exception $e) {
            \Log::error('Failed to create mail message: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
