<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Website extends Model
{
    //
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [
        'name' => 'required',
        'type_website' => 'required',
        'price' => 'required',
    ];
    protected $table = 'websites';
    protected $fillable = ['name','code','type_website','price','notes'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui Lòng Nhập Tên',
            'type_website.required' => 'Vui Lòng Nhập Loại Website',
            'price.required' => 'Vui Lòng Nhập Giá',
        ];
    }
}
