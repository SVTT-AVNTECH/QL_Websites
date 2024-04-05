<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Modules\AvnWebsite\App\Console\CheckWebsiteStatus;
use Modules\AvnWebsite\App\Console\CheckDomainAndHostingExpiration;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('avnwebsite:check-status')->everyMinute();
        $schedule->command('website:check-expiration')->everyMinute();
        // $schedule->command('inspire')->hourly();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        $this->load(__DIR__ . '/../../Modules/AvnWebsite/App/Console');

        require base_path('routes/console.php');
    }

    protected $commands = [
        // CheckWebsiteStatus::class,
        \Modules\AvnWebsite\App\Console\CheckDomainAndHostingExpiration::class,
    ];
}
