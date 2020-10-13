<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    //
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [
//        'code' => 'required',
//        'service_name' => 'required',
//        'start_date' => 'required',
//        'end_date' => 'required',
//        'exist_date' => 'required',
//        'id_customer' => 'required',

    ];
    protected $table = 'invoices';
    protected $fillable = ['id', 'code','price','VAT_price','total','id_customer','id_register_service','id_register_soft','id_staff','order_type','date','description'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
//            'service_name.required' => 'Vui lòng chọn khách hàng',
//            'start_date.required' => 'Vui lòng nhập ngày bắt đầu',
//            'end_date.required' => 'Vui lòng nhập ngày kết thúc',

        ];
    }

    public function get_receipt($key, $paginate)
    {
        $query = Invoice::
        leftJoin('customers as c', 'c.id', 'invoices.id_customer')
            ->leftJoin('register_soft', 'register_soft.id', 'invoices.id_register_soft')
            ->leftJoin('softwares', 'softwares.id', 'register_soft.id_software')
            ->leftJoin('register_services', 'register_services.id', 'invoices.id_register_service')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('invoices.*', 'c.name as customer_name', 'c.address as customer_address', 'c.address as customer_address',
                'softwares.name as softwares_name',
                'w.name as website_name',
                's.name as ssl_name',
                'e.name as email_name',
                'v.name as vps_name',
                'h.name as hosting_name',
                'd.name as domain_name')
            ->whereNull('register_services.deleted_at')
            ->whereNull('invoices.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at')
            ->where('c.name', 'LIKE', '%' . $key . '%')
            ->orwhere('c.phone_number', 'LIKE', '%' . $key . '%')
            ->orwhere('w.name', 'LIKE', '%' . $key. '%')
            ->orwhere('s.name', 'LIKE', '%' . $key . '%')
            ->orwhere('e.name', 'LIKE', '%' . $key . '%')
            ->orwhere('v.name', 'LIKE', '%' . $key . '%')
            ->orwhere('h.name', 'LIKE', '%' . $key . '%')
            ->orwhere('d.name', 'LIKE', '%' . $key . '%')
            ->paginate($paginate);
        return $query;
    }



    public function get_revenue($key, $paginate)
    {
        $register_services = db::table('invoices')
            ->leftJoin('customers as c', 'c.id', 'invoices.id_customer')
            ->select('invoices.*', 'c.name as customer_name', 'c.address as customer_address'
            )
            ->whereNull('c.deleted_at')
            ->whereNull('invoices.id_register_service')
            ->whereNull('invoices.id_register_soft')
            ->where('c.name', 'LIKE', '%' . $key . '%')
//                ->orwhere('invoices.date', 'LIKE', '%' . $request->name . '%')
            ->orderBy('invoices.id', 'ASC')
            ->paginate($paginate);
        return$register_services;
    }
}
