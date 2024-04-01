<?php

namespace Utilities;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\AvnWebsite\App\Events\WebsiteErrorDetected;
use Modules\AvnWebsite\App\Listeners\HandleWebsiteError;

class Telegram
{
    public static function sendMessage(User $user, $message){
        // ...............
    }
}
