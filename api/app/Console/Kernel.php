<?php
/**
 * Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
 * Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
 */

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\KeyGenerateCommand::class,
        \App\Console\Commands\JwtSecretGenerateCommand::class,
        \App\Console\Commands\ServeCommand::class,

        \App\Console\Commands\InstantCommand::class,
        \App\Console\Commands\InstantBackendCommand::class,
        \App\Console\Commands\InstantVueCrudCommand::class,
        \App\Console\Commands\InstantVueCommand::class,
        \App\Console\Commands\InstantVueMenuCommand::class,
        \App\Console\Commands\InstantVueApiCommand::class,

        \App\Console\Commands\ControllerMakeCommand::class,
        \App\Console\Commands\VueMenuMakeCommand::class,
        \App\Console\Commands\VueCrudMakeCommand::class,
        \App\Console\Commands\VueApiMakeCommand::class,
        \App\Console\Commands\RouteMakeCommand::class,
        \App\Console\Commands\ExampleMakeCommand::class,

        \App\Console\Commands\VendorPublishCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }
}
