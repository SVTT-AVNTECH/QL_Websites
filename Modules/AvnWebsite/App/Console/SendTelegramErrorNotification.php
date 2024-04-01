<?php

namespace Modules\AvnWebsite\App\Console;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Modules\AvnWebsite\App\Models\CheckErr;
use Irazasyed\LaravelTelegram\Telegram;

class SendTelegramErrorNotification extends Command
{
    protected $signature = 'avnwebsite:send-telegram-error-notification';
    protected $description = 'Send error notification via Telegram bot';

    protected $telegram;

    public function __construct(Telegram $telegram)
    {
        parent::__construct();
        $this->telegram = $telegram;
    }

    public function handle()
    {
        $websites = CheckErr::get();

        $client = new Client();

        foreach ($websites as $website) {
            try {
                $response = $client->get($website->url);
                if ($response->getStatusCode() >= 400) {
                    $errorMessage = $response->getStatusCode();
                    $this->notifyError($website->url, $errorMessage);
                }
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
                $this->notifyError($website->url, $errorMessage);
            }
        }
    }

    private function notifyError($url, $errorMessage)
    {
        $chatId = '6007524867:AAHpYBGN0-0ZJD6dJmNxYepfExb_YsS9rSk';
        $message = "Error on website: $url\nMessage: $errorMessage";

        $this->telegram->sendMessage($chatId, $message);
    }
}
