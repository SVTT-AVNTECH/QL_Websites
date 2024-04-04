<?php

namespace Utilities;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Telegram
{
    public static function sendMessage(User $user, $message)
    {
        $chatId = $user->tele_id;
        $token = env('TELEGRAM_BOT_TOKEN');
        $response = Http::post("https://api.telegram.org/bot$token/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
        ]);
        return $response;
        if ($response->successful()) {
            Log::info('Telegram message sent successfully');
            return true;
        } else {
            Log::error('Failed to send Telegram message: ' . $response->status());
            return false;
        }
    }
}
