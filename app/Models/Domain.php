<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [
        'fee_register' => 'required',
        'fee_remain' => 'required',
        'fee_remain' => 'required',
        'fee_tranformation' => 'required',
        'name' => 'required|unique:domains',

    ];
    protected $table = 'domains';
    protected $fillable = ['id','code', 'name','fee_register','fee_remain', 'fee_tranformation','notes'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên domain',
            'name.unique' => 'Tên Domain đã tồn tại.',
            'fee_register.required' => 'Vui lòng nhập phí đăng kí',
            'fee_remain.required' => 'Vui lòng nhập phí duy trì',
            'fee_tranformation.required' => 'Vui lòng nhập phí chuyển đổi',



        ];
    }

    public function getAll($key, $paginate) {
        $domain = Domain::where('domains.name', 'like', '%'.$key.'%')
//            ->orwhere('domains.fee_register', 'like', '%'.$key.'%')
//            ->orwhere('domains.fee_remain', 'like', '%'.$key.'%')
            ->select('domains.*')
            ->paginate($paginate);
        return $domain;
    }

}
