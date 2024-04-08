<?php

namespace Modules\AvnWebsite\App\Console;

use Illuminate\Console\Command;
use Modules\AvnWebsite\App\Models\AvnWebsites;
use Utilities\Telegram;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckDomainAndHostingExpiration extends Command
{
    protected $signature = 'website:check-expiration';

    public function handle()
    {
        $websites = AvnWebsites::with('user')->get();

        foreach ($websites as $website) {
            if ($this->isExpiringSoon($website->domain_date_expried) || $this->isExpiringSoon($website->hosting_date_expried)) {
                $this->sendNotification($website);
            }
        }
    }

    public function isExpiringSoon($expirationDate)
    {
        $expirationTimestamp = strtotime($expirationDate);
        $currentTimestamp = strtotime('now');
        $secondsInThreeDays = 5 * 24 * 60 * 60;

        return ($expirationTimestamp - $currentTimestamp) <= $secondsInThreeDays;
    }

    public function sendNotification($website)
    {
        $user = $website->user;
        if ($user) {

            $notificationMessage = "Website: $website->url\n";

            if ($website->domain_date_expried !== null && self::isExpiringSoon($website->domain_date_expried)) {
                $notificationMessage .= "Domain expiration date: $website->domain_date_expried (Domain will expire in 5 days)\n";
            }

            if ($website->hosting_date_expried !== null && self::isExpiringSoon($website->hosting_date_expried)) {
                $notificationMessage .= "Hosting expiration date: $website->hosting_date_expried (Hosting will expire in 5 days)\n";
            }

            if ($user->email) {
                try {
                    Mail::raw($notificationMessage, function ($message) use ($user) {
                        $message->to($user->email)->subject('Website Expiration Notification');
                    });
                } catch (\Exception $e) {
                    \Log::error('Failed to send email notification: ' . $e->getMessage());
                }
            }
            if ($user->tele_id) {
                try {
                    Telegram::sendMessage($user, $notificationMessage);
                } catch (\Exception $e) {
                    \Log::error('Failed to send Telegram notification: ' . $e->getMessage());
                }
            }
            if (!$user->email && !$user->tele_id) {
                \Log::warning('User has no email or Telegram chat ID: ' . $user->id);
            }
        } else {
            \Log::warning('User not found for website: ' . $website->url);
        }
    }
}
