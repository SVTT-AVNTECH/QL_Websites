<?php

namespace Modules\AvnWebsite\App\Console;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Modules\AvnWebsite\App\Models\Website;

class CheckWebsiteStatus extends Command
{
    protected $signature = 'avnwebsite:check-status';
    protected $description = 'Check status of websites';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $websites = Website::pluck('url')->all();

        $client = new Client();

        foreach ($websites as $website) {
            try {
                $response = $client->get($website);
                if ($response->getStatusCode() == 200) {
                    $this->info("$website is up!");
                } else {
                    $this->error("$website is down!");
                }
            } catch (\Exception $e) {
                $this->error("$website is down! Error: " . $e->getMessage());
            }
        }
    }
}
