<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hosting extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [
        'price' => 'required',
        'capacity' => 'required',
        'bandwith' => 'required',
        'sub_domain' => 'required',
        'email' => 'required',
        'ftp' => 'required',
        'database' => 'required',
        'adddon_domain' => 'required',
        'park_domain' => 'required',
        'name' => 'required',

    ];
    protected $table = 'hostings';
    protected $fillable = ['id','code', 'name', 'price','capacity','bandwith', 'sub_domain','email','ftp','database','adddon_domain','park_domain','notes'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên Hosting',
            'price.required' => 'Vui lòng nhập giá Hosting',
            'capacity.required' => 'Vui lòng nhập dung lượng Hosting',
            'bandwith.required' => 'Vui lòng nhập băng thông Hosting',
            'sub_domain.required' => 'Vui lòng nhập số lượng Sub_domain',
            'email.required' => 'Vui lòng nhập số lượng Email',
            'ftp.required' => 'Vui lòng nhập FTP',
            'database.required' => 'Vui lòng nhập số lượng Database',
            'adddon_domain.required' => 'Vui lòng nhập số lượng Addon_Domain',
            'park_domain.required' => 'Vui lòng nhập số lượng Park_Domain',




        ];
    }
}
