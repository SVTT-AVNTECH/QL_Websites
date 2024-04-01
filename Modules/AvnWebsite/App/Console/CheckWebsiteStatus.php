<?php

namespace Modules\AvnWebsite\App\Console;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Modules\AvnWebsite\App\Notifications\WebsiteErrorNotification;
use Modules\AvnWebsite\App\Models\CheckErr;
use App\Models\User;
use App\Events\WebsiteErrorDetected;
use Illuminate\Support\Facades\Event;


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
        $websites = CheckErr::get();

        $client = new Client();

        foreach ($websites as $website) {
            try {
                $url = $user->url;
                $response = $client->get($url);

                if ($response->getStatusCode() >= 400) {

                    $user = $website->user;
                    $this->notifyError($url, $response->getStatusCode());

                    event(new WebsiteErrorDetected($user, $url, $response->getStatusCode()));
                }
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        }
    }

    private function notifyError($url, $statusCode, $user)
    {
        $adminEmail = 'pxtruong02@gmail.com';

        $errorNotification = new WebsiteErrorNotification($url, $statusCode);

        Mail::to($adminEmail)->send($errorNotification);

        event(new WebsiteErrorDetected($user, $url, $statusCode));
    }
}


