<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    //
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [
        'name' => 'required',
        'phone_number' => 'required',
        'email' => 'required|email|unique:staffs',
    ];
    protected $table = 'staffs';
    protected $fillable = ['id','name','phone_number','email','address','birthday','id_user','role','type_staff'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên nhân viên ',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'phone_number.required' => 'Vui lòng nhập số điện thoại',
        ];
    }
}
