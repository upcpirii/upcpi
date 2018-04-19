<?php

namespace UPCEngineering\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use UPCEngineering\Console\Commands\CreateTenantCommand;
use UPCEngineering\Console\Scout\FlushCommand;
use UPCEngineering\Console\Scout\ImportCommand;
use UPCEngineering\Console\Tinker\TinkerCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        FlushCommand::class,
        ImportCommand::class,
        TinkerCommand::class,
        CreateTenantCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
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
