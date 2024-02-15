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

        Commands\Overdue::class,
        Commands\PublishTask::class,
        Commands\Partners::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->command('overdue:task')->dailyAt('8:00');
        // $schedule->command('publish:task')->weekly()->fridays()->at('17:00');
       // $schedule->command('partner:summary')->weekly()->fridays()->at('17:45');
       //$schedule->command('mda:weekly')->everyMinute();
       
    }

    protected function scheduleTimezone()
{
    return 'Africa/Lagos';
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
