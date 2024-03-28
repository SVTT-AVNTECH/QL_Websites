<?php

namespace App\Console;

use Illuminate\Console;
use Modules\AvnWebsite\App\Models\AvnWebsites;

class CheckDomainAndHostingExpiration extends Command
{
    protected $signature = 'website:check-expiration';
    protected $description = 'Check domain and hosting expiration from database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $websites = AvnWebsites::all();

        foreach ($websites as $website) {
            $domainExpirationDate = $website->domain_date_expried;
            $hostingExpirationDate = $website->hosting_date_expried;

            if ($this->isExpiringSoon($domainExpirationDate) || $this->isExpiringSoon($hostingExpirationDate)) {
                $this->sendNotification($website);
            }
        }
    }

    private function isExpiringSoon($expirationDate)
    {
        $expirationDate = strtotime($expirationDate);
        $currentDate = strtotime(now());
        return ($expirationDate - $currentDate) / (60 * 60 * 24) <= 30;
    }

    private function sendNotification($website)
    {
        $this->info("Website {$website->url} sắp đến hạn tên miền hoặc hosting.");
    }
}
