<?php

namespace Modules\AvnWebsite\App\Console;

use App\Models\Models\Website;
use App\Notifications\WebsiteErrorNotification;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Modules\AvnWebsite\App\Models\AvnWebsites;
use Modules\AvnWebsite\App\Models\CheckErr;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Modules\AvnWebsite\App\Events\WebsiteErrorDetected;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;


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

        $websites = AvnWebsites::get();

        $client = new Client();

        foreach ($websites as $website) {
            // try {
            $url = $website->url;

            $response = $client->get($url, ['http_errors' => false]);
            $status = $response->getStatusCode();
            if ($status >= 400) {
                $error = new CheckErr();
                $error->status_code = $status;
                $error->website_id = $website->id;

                $user = $website->user;
                // $this->notifyError($url, $status, $user);

                event(new WebsiteErrorDetected($user, $url, $status));
                return 'xxxxxxxxxxxxxx';
            }
            // } catch (\Exception $e) {
            //     return var_dump($response->getStatusCode());
            //     $this->error($e->getMessage());
            // }
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

