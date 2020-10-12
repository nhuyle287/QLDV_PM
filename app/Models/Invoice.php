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
