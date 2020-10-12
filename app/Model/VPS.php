<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VPS extends Model
{
    //
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [
        'name' => 'required',
        'price' => 'required',
        'cpu' => 'required',
        'capacity' => 'required',
        'bandwith' => 'required',
        'ram' => 'required',
        'technical' => 'required',
        'operating_system' => 'required',
        'backup' => 'required',
        'panel' => 'required',


    ];
    protected $table = 'vpss';
    protected $fillable = ['id','code', 'name', 'price','cpu','capacity', 'ram','bandwith','technical','operating_system','backup','panel','notes'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên VPS',
            'price.required' => 'Vui lòng nhập giá VPS',
            'cpu.required' => 'Vui lòng nhập số lượng CPU',
            'capacity.required' => 'Vui lòng nhập Dung Lượng VPS',
            'ram.required' => 'Vui lòng nhập số lượng Ram',
            'bandwith.required' => 'Vui lòng nhập băng thông VPS',
            'technical.required' => 'Vui lòng nhập Công nghệ ảo hóa',
            'operating_system.required' => 'Vui lòng nhập Hệ điều hành',
            'backup.required' => 'Vui lòng nhập số lượng Backup',
            'panel.required' => 'Vui lòng nhập Panel',


        ];
    }
}
