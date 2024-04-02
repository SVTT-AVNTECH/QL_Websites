<?php

namespace Utilities;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\AvnWebsite\App\Events\WebsiteErrorDetected;
use Modules\AvnWebsite\App\Listeners\HandleWebsiteError;

class Telegram
{
    public static function sendMessage(User $user, $message)
    {
        $chatId = $user->tele_id;
        $response = Http::post('https://api.telegram.org/6007524867:AAHpYBGN0-0ZJD6dJmNxYepfExb_YsS9rSk/sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
        ]);
        if ($response->successful()) {
            Log::info('Telegram message sent successfully');
            return true;
        } else {
            Log::error('Failed to send Telegram message: ' . $response->status());
            return false;
        }
    }
}
