<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterSoft extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [


        'id_software'=>'required',
        'id_typesoftware'=>'required',
        'id_customer' => 'required',
        'status'=>'required',
        'address_domain'=>'required',
        'id_staff'=>'required',


    ];
    protected $table = 'register_soft';
    protected $fillable = ['id','status','start_date','code', 'end_date','id_customer','notes','id_staff','address_domain','status','transaction','id_typesoftware','id_software'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [

            'id_customer.required'=>'Vui lòng chọn khách hàng !',
            'id_software.required'=>'Vui lòng chọn gói phần mềm',
            'id_typesoftware.required'=>'Vui lòng chọn loại phần mềm',

            'status.required' => 'Vui lòng chọn trạng thái phần mềm !',
            'address_domain.required' => 'Vui lòng nhập địa chỉ domain !',
            'id_staff.required' => 'Vui lòng chọn nhân viên !',

        ];
    }
}
