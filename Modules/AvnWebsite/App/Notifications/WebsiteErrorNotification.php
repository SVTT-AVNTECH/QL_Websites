<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class WebsiteErrorNotification extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
{
    try {
        return (new MailMessage)
            ->subject('Website Error Notification')
            ->line('An error occurred on the website with URL: ' . $notifiable->url)
            ->line('Please take necessary actions to resolve the issue.');
    } catch (\Exception $e) {
            \Log::error('Failed to create mail message: ' . $e->getMessage());
            return null;
    }
}

}
