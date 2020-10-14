<?php


namespace App\Business;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\RegisterService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RegisterServicesLogic extends BaseLogic
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return RegisterService::class;
    }

    public function getListRegisterServices($key, $paginate)
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'c.phone_number as phone',
                'w.name as website_name', 'w.type_website as website_type',
                's.name as ssl_name',
                'e.name as email_name',
                'v.name as vps_name',
                'h.name as hosting_name',
                'd.name as domain_name')
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at');
//
        $query->where('c.name', 'LIKE', '%' . $key . '%');
        $query->orderBy('register_services.id', 'ASC');
        return $query->paginate($paginate);
    }

    public function Search(Request $request)
    {
         $query = $this->model
             ->join('customers as c', 'c.id', 'register_services.id_customer')
             ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
             ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
             ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
             ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
             ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
             ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
             ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                 'c.phone_number as phone',
                 'w.name as website_name', 'w.type_website as website_type',
                 's.name as ssl_name',
                 'e.name as email_name',
                 'v.name as vps_name',
                 'h.name as hosting_name',
                 'd.name as domain_name',
                 'h.price as hosting_price',
                 'v.price as vps_price',
                 'e.price as email_price',
                 's.price as ssl_price',
                 'w.price as website_price',
                 'd.fee_register as domain_fee_register',
                 'd.fee_remain as domain_fee_remain',
                 'd.fee_tranformation as domain_fee_tranformation')
             ->where('register_services.transaction', '!=', "0")
             ->whereNull('register_services.deleted_at')
             ->whereNull('c.deleted_at')
             ->whereNull('d.deleted_at')
             ->whereNull('h.deleted_at')
             ->whereNull('v.deleted_at')
             ->whereNull('e.deleted_at')
             ->whereNull('s.deleted_at')
             ->whereNull('w.deleted_at');
        if ($request) {
            if (isset($request->key)) {
                $query->where('c.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('c.phone_number', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('w.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('s.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('e.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('v.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('h.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('d.name', 'LIKE', '%' . $request->key . '%');
            }

        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->get();
    }



    public function getIndexRegisterServices($register_id)
    {
        return $query = RegisterService::join('customers as c', 'c.id', 'register_services.id_customer')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*', 'c.name as customer_name','c.address as address',
                 'w.name as website_name',
                 's.name as ssl_name',
                 'e.name as email_name',
                 'v.name as vps_name',
                 'h.name as hosting_name',
                 'd.name as domain_name',
                'h.price as hosting_price',
                'v.price as vps_price',
                'e.price as email_price',
                's.price as ssl_price',
                'w.price as website_price',
                'd.fee_register as domain_fee_register',
                'd.fee_remain as domain_fee_remain',
                'd.fee_tranformation as domain_fee_tranformation'
            )
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at')
            //dựa theo id của registerservices để lấy thông tin
            ->where('register_services.id', $register_id)
            ->first();
    }

    public function getListRegisteredService()
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'w.name as website_name', 'w.type_website as website_type',
                's.name as ssl_name',
                'e.name as email_name',
                'v.name as vps_name',
                'h.name as hosting_name',
                'd.name as domain_name')
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at')
            ->where('register_services.transaction', '==', "2");
        $query->orderBy('register_services.id', 'ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }



    public function SearchSoftServices(Request $request)
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'c.phone_number as phone',
                'w.name as website_name', 'w.type_website as website_type',
                's.name as ssl_name',
                'e.name as email_name',
                'v.name as vps_name',
                'h.name as hosting_name',
                'd.name as domain_name')
            ->where('register_services.transaction', '==', "1")
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at');

        if ($request) {
            if (isset($request->key)) {
                $query->where('c.name', 'LIKE', '%' . $request->key . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }
// domain using
    public function Searchdomain(Request $request)
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->Join('domains as d', 'd.id', 'register_services.id_domain')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'd.name as domain_name',
                'd.fee_register as domain_fee_register',
                'd.fee_remain as domain_fee_remain',
                'd.fee_tranformation as domain_fee_tranformation')
            ->where('register_services.transaction', '!=', "0")
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')        ;
        if ($request) {
            if (isset($request->key)) {
                $query->where('c.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('c.phone_number', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('d.name', 'LIKE', '%' . $request->key . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->get();
    }
    //hosting
    public function Searchhosting(Request $request)
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->join('hostings as h', 'h.id', 'register_services.id_hosting')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'h.name as hosting_name'
               )
            ->where('register_services.transaction', '!=', "0")
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('h.deleted_at')        ;
        if ($request) {
            if (isset($request->key)) {
                $query->where('c.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('c.phone_number', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('h.name', 'LIKE', '%' . $request->key . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->get();
    }
    //vps
    public function Searchvps(Request $request)
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->join('vpss as v', 'v.id', 'register_services.id_vps')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'v.name as vps_name'
            )
            ->where('register_services.transaction', '!=', "0")
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('v.deleted_at')        ;
        if ($request) {
            if (isset($request->key)) {
                $query->where('c.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('c.phone_number', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('v.name', 'LIKE', '%' . $request->key . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->get();
    }
    //ssl
    public function Searchssl(Request $request)
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->join('ssls as s', 's.id', 'register_services.id_ssl')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                's.name as ssl_name'
            )
            ->where('register_services.transaction', '!=', "0")
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('s.deleted_at')        ;
        if ($request) {
            if (isset($request->key)) {
                $query->where('c.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('c.phone_number', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('s.name', 'LIKE', '%' . $request->key . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->get();
    }
    //email
    public function Searchemail(Request $request)
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->join('emails as e', 'e.id', 'register_services.id_email')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'e.name as email_name'
            )
            ->where('register_services.transaction', '!=', "0")
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('e.deleted_at')        ;
        if ($request) {
            if (isset($request->key)) {
                $query->where('c.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('c.phone_number', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('e.name', 'LIKE', '%' . $request->key . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->get();
    }
    //website
    public function Searchwebsite(Request $request)
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->join('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'w.name as website_name'
            )
            ->where('register_services.transaction', '!=', "0")
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('w.deleted_at')        ;
        if ($request) {
            if (isset($request->key)) {
                $query->where('c.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('c.phone_number', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('w.name', 'LIKE', '%' . $request->key . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->get();
    }
}
