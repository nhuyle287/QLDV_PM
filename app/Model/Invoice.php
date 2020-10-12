<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    protected $fillable = ['id', 'code','price','VAT_price','total','id_customer','id_register_service'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
//            'service_name.required' => 'Vui lòng chọn khách hàng',
//            'start_date.required' => 'Vui lòng nhập ngày bắt đầu',
//            'end_date.required' => 'Vui lòng nhập ngày kết thúc',

        ];
    }

}
