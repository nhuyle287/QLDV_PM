<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Contract extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [

    ];
    protected $table = 'contracts';
    protected $primaryKey='id';
    protected $fillable = ['id', 'code','id_customer','id_website', 'id_ssl','id_domain','id_hosting',
        'price_1','price2','total_price','promotion','discount_price','languages','date_finish','date_infor',
        'date_demo','date_code','date_test','quantity_ssl','quantity_domain','quantity_hosting','quantity_website','date_create'];



    public function __construct()
    {
        parent::__construct();
        $this->message = [
//            'name.required' => 'Vui lòng nhập tên khách hàng ',
//            'email.required' => 'Vui lòng nhập email',
//            'email.unique' => 'Email đã tồn tại',
//            'phone_number.required' => 'Vui lòng nhập số điện thoại',

        ];
    }
    public function getAll($key,$paginate)
    {
        $contracts = db::table('contracts')
            ->join('customers', 'customers.id', '=', 'contracts.id_customer')
            ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
            ->whereNull('contracts.deleted_at')
            ->whereNull('customers.deleted_at')
            ->where('customers.name', 'LIKE', '%' . $key . '%')
            ->where('contracts.code', 'LIKE', '%' . $key . '%')
            ->paginate($paginate);
        return $contracts;
    }
    public function getsearch($key, $paginate,$filter) {

        if ($key != null) {
            if ($filter == 2) {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->join('hostings', 'hostings.id', '=', 'contracts.id_hosting')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->whereNull('hostings.deleted_at')
                    ->where('contracts.id_website', '=', null)
                    ->where('customers.name', 'LIKE', '%' . $key . '%')

//                    ->where('contracts.date_create', 'LIKE', '%' . $search . '%')
                    ->paginate($paginate);
            } elseif ($filter == 0) {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->where('customers.name', 'LIKE', '%' . $key . '%')

                    ->paginate($paginate);
            } elseif ($filter == 1) {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->whereNotNull('contracts.id_website')
                    ->whereNotNull('contracts.id_hosting')
                    ->whereNotNull('contracts.id_domain')
                    ->whereNotNull('contracts.id_ssl')
                    ->where('customers.name', 'LIKE', '%' . $key . '%')

                    ->paginate($paginate);
            } elseif ($filter == 3) {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->join('vpss', 'vpss.id', '=', 'contracts.id_vps')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->whereNull('vpss.deleted_at')
                    ->where('contracts.id_website', '=', null)
                    ->where('customers.name', 'LIKE', '%' . $key . '%')

                    ->paginate($paginate);
            } elseif ($filter == 4) {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->join('domains', 'domains.id', '=', 'contracts.id_domain')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->whereNull('domains.deleted_at')
                    ->where('contracts.id_website', '=', null)
                    ->where('customers.name', 'LIKE', '%' . $key . '%')

                    ->paginate($paginate);
            } else {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->where('customers.name', 'LIKE', '%' . $key . '%')

                    ->paginate($paginate);
            }
        } else {
            if ($filter == 2) {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->join('hostings', 'hostings.id', '=', 'contracts.id_hosting')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->whereNull('hostings.deleted_at')
                    ->where('contracts.id_website', '=', null)
                    ->paginate($paginate);
            } elseif ($filter == 0) {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->paginate($paginate);
            } elseif ($filter == 1) {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->whereNotNull('contracts.id_website')
                    ->whereNotNull('contracts.id_hosting')
                    ->whereNotNull('contracts.id_domain')
                    ->whereNotNull('contracts.id_ssl')
                    ->paginate($paginate);
            } elseif ($filter == 3) {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->join('vpss', 'vpss.id', '=', 'contracts.id_vps')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->whereNull('vpss.deleted_at')
                    ->where('contracts.id_website', '=', null)
                    ->paginate($paginate);
            } else {
                $contracts = db::table('contracts')
                    ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                    ->join('domains', 'domains.id', '=', 'contracts.id_domain')
                    ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                    ->whereNull('contracts.deleted_at')
                    ->whereNull('customers.deleted_at')
                    ->whereNull('domains.deleted_at')
                    ->where('contracts.id_website', '=', null)
                    ->paginate($paginate);
            }

        }
        return $contracts;
    }


    public function getfilter($filter,$paginate)
    {
        if ($filter == 2) {
            $contracts = db::table('contracts')
                ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                ->join('hostings', 'hostings.id', '=', 'contracts.id_hosting')
                ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                ->whereNull('contracts.deleted_at')
                ->whereNull('customers.deleted_at')
                ->whereNull('hostings.deleted_at')
                ->where('contracts.id_website', '=', null)
                ->paginate($paginate);
        } elseif ($filter == 0) {
            $contracts = db::table('contracts')
                ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                ->whereNull('contracts.deleted_at')
                ->whereNull('customers.deleted_at')
                ->paginate($paginate);
        } elseif ($filter == 1) {
            $contracts = db::table('contracts')
                ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.code')
                ->whereNull('contracts.deleted_at')
                ->whereNull('customers.deleted_at')
                ->whereNotNull('contracts.id_website')
                ->whereNotNull('contracts.id_hosting')
                ->whereNotNull('contracts.id_domain')
                ->whereNotNull('contracts.id_ssl')
                ->paginate($paginate);
        } elseif ($filter == 3) {
            $contracts = db::table('contracts')
                ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                ->join('vpss', 'vpss.id', '=', 'contracts.id_vps')
                ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                ->whereNull('contracts.deleted_at')
                ->whereNull('customers.deleted_at')
                ->whereNull('vpss.deleted_at')
                ->where('contracts.id_website', '=', null)
                ->paginate($paginate);
        } else {
            $contracts = db::table('contracts')
                ->join('customers', 'customers.id', '=', 'contracts.id_customer')
                ->join('domains', 'domains.id', '=', 'contracts.id_domain')
                ->select('contracts.id', 'customers.name', 'contracts.date_create', 'contracts.languages', 'contracts.code')
                ->whereNull('contracts.deleted_at')
                ->whereNull('customers.deleted_at')
                ->whereNull('domains.deleted_at')
                ->where('contracts.id_website', '=', null)
                ->paginate($paginate);
        }
        return $contracts;
    }



}

