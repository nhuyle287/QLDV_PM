<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterService extends Model
{
    //
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [
//        'code' => 'required',

//        'exist_date' => 'required',
        'id_customer' => 'required',


    ];
    protected $table = 'register_services';
    protected $fillable = ['id', 'code','status','transaction','service_type','start_date','exist_date', 'end_date',
        'id_customer','id_domain','id_hosting','id_vps','id_email','id_ssl','id_website','notes','address_domain','date_using'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [

            'id_customer.required'=>'Vui lòng chọn khách hàng !',

        ];
    }

//    public function get_register($key, $paginate)
//    {
//        $query=RegisterSoft::join('customers as c','c.id','register_soft.id_customer')
//            ->join('softwares as sw','sw.id','register_soft.id_software')
//            ->join('typesoftwares as ts','ts.id','register_soft.id_typesoftware')
//            ->join('users as u','u.id','register_soft.id_staff')
//            ->select('register_soft.*','c.name as customer_name','sw.name as software',
//                'ts.name as typesoftware','u.name as staff_name',
//                'c.email as customer_email')
//            ->wherenull('register_soft.deleted_at')
//            ->wherenull('c.deleted_at')
//            ->wherenull('sw.deleted_at')
//            ->wherenull('u.deleted_at')
//            ->where('register_soft.transaction', '!=', "0")
//            ->union(RegisterService::join('customers as c', 'c.id', 'register_services.id_customer')
//                ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
//                ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
//                ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
//                ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
//                ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
//                ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
//                ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
//                    'c.phone_number as phone',
//                    'w.name as website_name', 'w.type_website as website_type',
//                    's.name as ssl_name',
//                    'e.name as email_name',
//                    'v.name as vps_name',
//                    'h.name as hosting_name',
//                    'd.name as domain_name',
//                    'h.price as hosting_price',
//                    'v.price as vps_price',
//                    'e.price as email_price',
//                    's.price as ssl_price',
//                    'w.price as website_price',
//                    'd.fee_register as domain_fee_register',
//                    'd.fee_remain as domain_fee_remain',
//                    'd.fee_tranformation as domain_fee_tranformation')
//                ->where('register_services.transaction', '!=', "0")
//                ->whereNull('register_services.deleted_at')
//                ->whereNull('c.deleted_at')
//                ->whereNull('d.deleted_at')
//                ->whereNull('h.deleted_at')
//                ->whereNull('v.deleted_at')
//                ->whereNull('e.deleted_at')
//                ->whereNull('s.deleted_at')
//                ->whereNull('w.deleted_at'))
//            ->where('c.name', 'LIKE', '%' . $key . '%')
//        ->paginate($paginate);
//        return $query;
//    }


}
