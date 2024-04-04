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

            $has_err = false;
            $statusCode = null;
            $errorMessage = null;
            try {
                $response = $client->get($url, ['http_errors' => false]);
                $statusCode = $response->getStatusCode();
                if ($statusCode >= 400) {
                    $has_err = true;
                }
            } catch (\Throwable $th) {
                $has_err = true;
                $errorMessage = $th->getMessage();
            }

            if ($has_err) {
                $user = $website->user;
                $message = $statusCode ? "Error $statusCode site $url" : "Error accessing site $url: $errorMessage";
                Telegram::sendMessage($user, $message);
                $this->notifyError($statusCode, $url, $user);
                // event(new WebsiteErrorDetected($user, $url, $statusCode));
            }
        }
    }

    public function notifyError($statusCode, $url, $user)
    {
        if ($statusCode >= 400 && $user) {
            try {
                $message = $statusCode . $url;
                Mail::raw($url . $statusCode, function ($message) use ($user) {
                    $message->to($user->email)->subject('ERROR');
                });
            } catch (\Exception $e) {
                \Log::error('Failed to send error notification: ' . $e->getMessage());
            }
        }
    }


}
