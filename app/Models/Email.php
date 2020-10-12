<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    //
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [
        'name' => 'required',
        'price' => 'required',
        'capacity' => 'required',
        'email_number' => 'required',
        'email_forwarder' => 'required',
        'email_list' => 'required',
        'parked_domains' => 'required',
        'notes' => 'required',

    ];
    protected $table = 'emails';
    protected $fillable = ['id','code', 'name', 'price','capacity','email_number', 'email_forwarder','email_list','parked_domains','notes'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên Email',
            'price.required' => 'Vui lòng nhập giá Email',
            'capacity.required' => 'Vui lòng nhập dung lượng Email',
            'email_number.required' => 'Vui lòng nhập Email Number',
            'email_forwarder.required' => 'Vui lòng nhập Email Forwarder',
            'email_list.required' => 'Vui lòng nhập danh sách Email',
            'parked_domains.required' => 'Vui lòng nhập số lượng Parked-domains',




        ];
    }
}
