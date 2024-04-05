<?php

namespace Modules\AvnWebsite\App\Console;

use Illuminate\Console\Command;
use Modules\AvnWebsite\App\Models\AvnWebsites;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckDomainAndHostingExpiration extends Command
{
    protected $signature = 'website:check-expiration';
    public static function handle()
    {
        $websites = AvnWebsites::with('user')->get();

        foreach ($websites as $website) {
            if (self::isExpiringSoon($website->domain_date_expried) || self::isExpiringSoon($website->hosting_date_expried)) {
                self::sendNotification($website);
            }
        }
    }

    public static function isExpiringSoon($expirationDate)
    {
        $expirationTimestamp = strtotime($expirationDate);
        $currentTimestamp = strtotime('now');
        $secondsInThreeDays = 3 * 24 * 60 * 60;

        return ($expirationTimestamp - $currentTimestamp) <= $secondsInThreeDays;
    }

    public static function sendNotification($website)
    {
        $user = $website->user;
        if ($user && $user->email) {
            try {

                $emailBody = "Website: $website->url\n";
                if ($website->domain_date_expried !== null && self::isExpiringSoon($website->domain_date_expried)) {
                    $emailBody .= "Domain expiration date: $website->domain_date_expried (Domain is expiring soon)\n";
                }

                if ($website->hosting_date_expried !== null && self::isExpiringSoon($website->hosting_date_expried)) {
                    $emailBody .= "Hosting expiration date: $website->hosting_date_expried (Hosting is expiring soon)\n";
                }


                Mail::raw($emailBody, function ($message) use ($user) {
                    $message->to($user->email)->subject('Website Expiration Notification');
                });
            } catch (\Exception $e) {
                \Log::error('Failed to send notification: ' . $e->getMessage());
            }
        } else {
            \Log::warning('User has no email or user not found for website: ' . $website->url);
        }
    }
}
