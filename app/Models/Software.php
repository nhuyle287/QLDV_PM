<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Software extends Model
{
    //
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [
        'name' => 'required',
        'price' => 'required',
        'quantity_branch' => 'required',
        'quantity_staff' => 'required',
        'quantity_acc' => 'required',
        'quantity_product' => 'required',
        'quantity_bill' => 'required',
    ];
    protected $table = 'softwares';
    protected $fillable = ['id','name','quantity_branch','quantity_staff','quantity_acc','quantity_product','quantity_bill','price','notes'];

    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên phần mềm',
            'price.required' => 'Vui lòng nhập giá',
            'quantity_branch.required' => 'Vui lòng nhập số lượng chi nhánh',
            'quantity_staff.required' => 'Vui lòng nhập số lượng nhân viên',
            'quantity_acc.required' => 'Vui lòng nhập số lượng tài khoản',
            'quantity_product.required' => 'Vui lòng nhập số lượng sản phẩm/dịch vụ',
            'quantity_bill.required' => 'Vui lòng nhập số lượng hóa đơn/tháng',
            ];
    }
    public function getAll($key, $paginate) {
        $software = Software::where('softwares.name', 'like', '%'.$key.'%')
            ->select('softwares.*')
            ->paginate($paginate);
        return $software;
    }
}
