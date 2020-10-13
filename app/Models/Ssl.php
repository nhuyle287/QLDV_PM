<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ssl extends Model
{
    //
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [
        'name' => 'required',
        'price' => 'required',
        'insurance_policy' => 'required',
        'domain_number' => 'required',
        'reliability' => 'required',
        'green_bar' => 'required',
        'sans' => 'required',
    ];
    protected $table = 'ssls';
    protected $fillable = ['name','code', 'price','insurance_policy','domain_number', 'reliability','green_bar','sans','notes'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên SSL',
            'price.required' => 'Vui lòng nhập giá SSL',
            'insurance_policy.required' => 'Vui lòng nhập Chính Sách Bảo Hiểm',
            'domain_number.required' => 'Vui lòng nhập Số Domain Được Bảo Mật',
            'reliability.required' => 'Vui lòng nhập Dodojj Tin Cậy',
            'green_bar.required' => 'Vui lòng cho biết có thanh địa chỉ màu xanh hay không',
            'sans.required' => 'Vui lòng nhập Sans',
        ];
    }
    public function getAll($key, $paginate) {
        $sll = Ssl::where('ssls.name', 'like', '%'.$key.'%')
            ->select('ssls.*')
            ->paginate($paginate);
        return $sll;
    }
}
