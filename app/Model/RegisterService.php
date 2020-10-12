<?php

namespace App\Model;

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
    protected $fillable = ['id', 'code','status','service_type','start_date','exist_date', 'end_date','id_customer','id_domain','id_hosting','id_vps','id_email','id_ssl','id_website','notes','address_domain'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [

            'id_customer.required'=>'Vui lòng chọn khách hàng !',

        ];
    }
}
