<?php


namespace App\Business;


use App\Model\RegisterService;
use Illuminate\Support\Facades\Config;

class RegisterServicesLogic extends BaseLogic
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return RegisterService::class;
    }

    public function getListRegisterServices()
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
            ->whereNull('w.deleted_at');
//        if ($search) {
//            if (isset($search->page) && is_numeric($search->page)) {
//                $query->offset($search->page * Config::get('constants.pagination'));
//            }
//        }
        //DESC GIẢM DÂN
        //ASC TĂNG DẦN
        $query->orderBy('register_services.id', 'ASC');
        return $query->paginate(Config::get('constants.pagination'));
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
            ->select('register_services.*', 'c.name as customer_name',
                 'w.name as website_name',
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
            //dựa theo id của registerservices để lấy thông tin
            ->where('register_services.id', $register_id)
            ->first();
    }
}
