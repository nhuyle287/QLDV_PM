<?php

namespace App\Console\Commands;

use App\Mail\mails;
use App\Models\Customer;
use App\Models\Domain;
use App\Models\Email;
use App\Models\Hosting;
use App\Models\RegisterService;
use App\Models\RegisterSoft;
use App\Models\Software;
use App\Models\Ssl;
use App\Models\VPS;
use App\Models\Website;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RemindExpried extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind_expried:update';

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
        $register_service = RegisterService::all();
        $curent_date = date('Y-m-d');
        $too_late =date('Y-m-d H:i:s', strtotime ( '+7 day' , strtotime ( $curent_date )));

        foreach ($register_service as $i) {
            $address_domain=$i;
            $ssl=Ssl::find($i->id_ssl);
            $vps=VPS::find($i->id_vps);
            $email=Email::find($i->id_email);
            $domain=Domain::find($i->id_domain);
            $hosting=Hosting::find($i->id_hosting);
            $website=Website::find($i->id_website);
           if($ssl!==null)
           {
               $service_name=$ssl->name;
           }
           elseif ($vps!==null)
           {
               $service_name=$vps->name;
           }
           elseif ($email!==null)
           {
               $service_name=$email->name;
           }
           elseif ($domain!==null)
           {
               $service_name=$domain->name;
           }
           elseif ($hosting!==null)
           {
               $service_name=$hosting->name;
           }
           else{
               $service_name=$website->name;
           }

            if ($i->end_date==$too_late){
                $cus = Customer::find($i->id_customer);

                Mail::to($cus->email)->send(new mails($cus,$service_name,$address_domain));
            }

        }
        $register_soft = RegisterSoft::all();

        foreach ($register_soft as $soft)
        {
            $address_domain=$soft;
            $service=Software::find($soft->id_software);
            if ($soft->end_date==$too_late){
                $cus = Customer::find($soft->id_customer);
                Mail::to($cus->email)->send(new mails($cus,$service,$address_domain));
            }
        }
        $this->info(' Send email successfully!');
    }
}
