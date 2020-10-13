<?php

namespace App\Console\Commands;

use App\Models\RegisterService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExistDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:existdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $register_service=RegisterService::all();
        foreach ($register_service as $i){
            $exist_date=date(strtotime($i->end_date))-time();

            if($exist_date < 0){
                $years = floor(ABS($exist_date) / (365 * 60 * 60 * 24));
                $months = floor((ABS($exist_date) - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $days = floor((ABS($exist_date) - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                $i->exist_date="Quá $days-$months-$years";
                $i->save();
            }
            else {
                $years = floor($exist_date / (365 * 60 * 60 * 24));
                $months = floor(($exist_date - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $days = floor(($exist_date - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

                $i->exist_date = "Còn $days-$months-$years";
                $i->save();
            }
//            if(($a->d<30)){
//                $register_service->status=1;
//            }
        }
    }
}
