<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Ensure this task only runs in non-production environments and if IS_DEMO is explicitly true.
        // This is a destructive operation and should never run on a live production database.
        if (env('APP_ENV') !== 'production' && env('IS_DEMO', false)) {
            $hour = config('app.hour');
            $min = config('app.min');

            // Construct the cron expression based on SCHEDULED_HOUR and SCHEDULED_MIN
            // If SCHEDULED_HOUR is set, it runs at that hour.
            // If SCHEDULED_MIN is also set (and not 0), it runs at that minute of the hour.
            // If SCHEDULED_HOUR is not set, but SCHEDULED_MIN is, it runs every X minutes specified by SCHEDULED_MIN.
            // Defaults to running daily at midnight if neither is set, but the command itself is guarded by IS_DEMO.
            $cronExpression = '0 0 * * *'; // Default: daily at midnight

            if (!empty($hour)) {
                $cronMinute = (!empty($min) && $min != 0) ? $min : '0';
                $cronExpression = "{$cronMinute} */{$hour} * * *";
            } elseif (!empty($min) && $min != 0) {
                $cronExpression = "*/{$min} * * * *";
            }

            $schedule->command('migrate:fresh --seed')
                     ->cron($cronExpression)
                     ->withoutOverlapping(); // Recommended to prevent task overlap
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
