<?php

namespace Modules\AvnWebsite\App\Listeners;

use Modules\AvnWebsite\App\Events\WebsiteErrorDetected;
use Illuminate\Support\Facades\Mail;
use Utilities\Telegram;
use Illuminate\Support\Facades\Log;

class HandleWebsiteError
{
    /**
     * Handle the event.
     *
     * @param  WebsiteErrorDetected  $event
     * @return void
     */
    public function handle(WebsiteErrorDetected $event)
    {
        Log::info('Handling WebsiteErrorDetected event.');

        $user = $event->user;
        $url = $event->url;
        $statusCode = $event->statusCode;

        $message = "Error $statusCode occurred on website: $url";
        Telegram::sendMessage($user, $message);

        try {
            Mail::raw($message, function ($mail) use ($user) {
                $mail->to($user->email)->subject('Website Error Notification');
            });
        } catch (\Exception $e) {
            Log::error('Failed to send error notification email: ' . $e->getMessage());
        }
    }
}
