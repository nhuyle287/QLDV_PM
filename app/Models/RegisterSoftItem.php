<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterSoftItem extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';

    public $message = [];
    public $rules = [

        'id_product' => 'required',


    ];
    protected $table = 'register_softitem';
    protected $fillable = ['id','id_order','id_product'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [

            'id_product.required'=>'Vui lòng chọn sản phẩm !',
        ];
    }
}
