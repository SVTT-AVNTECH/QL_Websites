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
        $websites = Website::get();

        $client = new Client();

        foreach ($websites as $website) {
            try {
                $response = $client->get($website->url);
                if ($response->getStatusCode() > 399) {
                    $this->info("Error!");
                }
            } catch (\Exception $e) {
                $this->error("Error: " . $e->getMessage());
            }
        }
    }
}
