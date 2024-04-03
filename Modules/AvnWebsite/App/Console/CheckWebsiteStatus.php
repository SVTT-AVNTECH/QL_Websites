<?php

namespace Modules\AvnWebsite\App\Console;

use App\Models\Models\Website;
use Modules\AvnWebsite\App\Notifications\WebsiteErrorNotification;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Modules\AvnWebsite\App\Models\AvnWebsites;
use Modules\AvnWebsite\App\Models\CheckErr;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Modules\AvnWebsite\App\Events\WebsiteErrorDetected;
use Utilities\Telegram;
use Illuminate\Support\Facades\Log;


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


    public static function notifyError($statusCode, $url)
    {
        try {

            $message = $statusCode . $url;
            Telegram::sendMessage(Auth::user(), $message);

            Mail::raw($url . $statusCode, function ($message) {
                $message->to('pxtruong02@gmail.com')->subject('Lỗi');
            });

        } catch (\Exception $e) {
            \Log::error('Failed to send error notification: ' . $e->getMessage());
        }
    }

}


