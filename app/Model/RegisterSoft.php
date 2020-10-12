<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegisterSoft extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [

        'start_date' => 'required',
        'end_date' => 'required',
        'id_software'=>'required',
        'id_typesoftware'=>'required',
        'id_customer' => 'required',
        'status'=>'required',
        'address_domain'=>'required',
        'id_staff'=>'required',


    ];
    protected $table = 'register_soft';
    protected $fillable = ['id','status','start_date', 'end_date','id_customer','notes','id_staff','address_domain','status','id_typesoftware','id_software'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [

            'id_customer.required'=>'Vui lòng chọn khách hàng !',
            'id_software.required'=>'Vui lòng chọn gói phần mềm',
            'id_typesoftware.required'=>'Vui lòng chọn loại phần mềm',
            'start_date.required' => 'Vui lòng nhập ngày bắt đầu !',
            'status.required' => 'Vui lòng chọn trạng thái phần mềm !',
            'address_domain.required' => 'Vui lòng nhập địa chỉ domain !',
            'id_staff.required' => 'Vui lòng chọn nhân viên !',
            'end_date.required' => 'Vui lòng nhập ngày kết thúc !',
        ];
    }
}
