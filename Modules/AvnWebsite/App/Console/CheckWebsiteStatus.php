<?php

namespace Modules\AvnWebsite\App\Console;

use App\Models\Models\Website;
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
            $url = $website->url;

            $response = $client->get($url, ['http_errors' => false]);
            $statusCode = $response->getStatusCode();

            if ($statusCode >= 400) {
                $error = new CheckErr();
                $error->status_code = $statusCode;
                $error->website_id = $website->id;
                $user = $website->user;
                $this->notifyError($statusCode, $url, $user);
                event(new WebsiteErrorDetected($user, $url, $statusCode));
                return 'xxxxxxxxxxxxxx';
            }
        }
    }

    public function notifyError($statusCode, $url)
    {
        if ($statusCode >= 400) {
            try {
                $message = $statusCode . $url;
                Mail::raw($url . $statusCode, function ($message) {
                    $message->to(env('MAIL_USERNAME'))->subject('Lỗi');
                });
            } catch (\Exception $e) {
                \Log::error('Failed to send error notification: ' . $e->getMessage());
            }
        }
    }

}
