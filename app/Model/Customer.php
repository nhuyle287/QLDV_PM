<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [
        'name' => 'required',
        'phone_number' => 'required',
        'email' => 'required|email|unique:customers',
    ];
    protected $table = 'customers';
    protected $fillable = ['id', 'name','phone_number','email', 'address','birthday','notes'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên khách hàng ',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'phone_number.required' => 'Vui lòng nhập số điện thoại',

        ];
    }
}

