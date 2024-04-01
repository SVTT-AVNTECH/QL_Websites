<?php

namespace Modules\AvnWebsite\App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WebsiteErrorDetected
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $url;
    public $statusCode;

    public function __construct(User $user, $url, $statusCode)
    {
        $this->user = $user;
        $this->url = $url;
        $this->statusCode = $statusCode;
    }
}

