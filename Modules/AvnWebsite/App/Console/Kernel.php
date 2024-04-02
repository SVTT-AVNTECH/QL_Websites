<?php

namespace Modules\AvnWebsite\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Modules\AvnWebsite\App\Console\CheckWebsiteStatus;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('avnwebsite:check-status')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/../Commands');

        $this->load(__DIR__ . '/Console');

        require base_path('routes/console.php');
    }

    protected $commands = [
        CheckWebsiteStatus::class,
    ];
}
