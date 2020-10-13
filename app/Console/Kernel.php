<?php

namespace App\Console;

use App\Models\RegisterService;
use Aws\Command;
use Carbon\Carbon;
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
        Commands\ExistDate::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('update:existdate')->everyMinute();
//         $schedule->call(function (){
//             $registersevice=RegisterService::all();
//             foreach ($registersevice as $i){
//                 $end_date= Carbon::parse( $i->end_date);
//                 $now=Carbon::now();
//                 $a=$end_date->diff($now);
//                 $i->exist_date=$a->d;
//                 $i->save();
//
//             }
//         })->everyMinute();
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
