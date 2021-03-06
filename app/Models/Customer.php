<?php


namespace App\Models;


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
    protected $fillable = ['id', 'name','phone_number','email', 'address','notes',
        'nameStore','position','fax_number','account_number','open_at','tax_number'];
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

    public function getAll($key, $paginate) {
        $customers = Customer::where('customers.name', 'like', '%'.$key.'%')
            ->orwhere('customers.email', 'like', '%'.$key.'%')
            ->orwhere('customers.phone_number', 'like', '%'.$key.'%')
            ->select('customers.*')
            ->paginate($paginate);
        return $customers;
    }
}

