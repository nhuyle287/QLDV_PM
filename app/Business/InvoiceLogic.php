<?php


namespace App\Business;


use App\Models\Expenditure;
use App\Models\Invoice;
use App\Models\payment;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class InvoiceLogic extends BaseLogic
{
    public function model()
    {
        return Invoice::class;
    }
    public function totalprice($start){
        $query=$this->model->whereMonth('invoices.created_at','=',$start)->sum('invoices.total') ;
        $expenditure=Expenditure::whereMonth('expenditures.created_at','=',$start)->sum('expenditures.price') ;
        $query=$query-$expenditure;
        return $query;
    }
    public function getListInvoice()
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'invoices.id_customer')
            ->leftJoin('domains as d', 'd.id', 'invoices.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'invoices.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'invoices.id_vps')
            ->leftJoin('emails as e', 'e.id', 'invoices.id_email')
            ->leftJoin('ssls as s', 's.id', 'invoices.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'invoices.id_website')
            ->select('invoices.*', 'c.name as customer_name',
                'w.code as website_code', 'w.name as website_name', 'w.type_website as website_type',
                's.code as ssl_code', 's.name as ssl_name',
                'e.code as email_code', 'e.name as email_name',
                'v.code as vps_code', 'v.name as vps_name',
                'h.code as hosting_code', 'h.name as hosting_name',
                'd.code as domain_code', 'd.name as domain_name')
            ->whereNull('invoices.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at');
        $query->orderBy('invoices.id', 'ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }

    public function getIndexInvoice($invoice_id)
    {
        return $query = Invoice::join('customers as c', 'c.id', 'invoices.id_customer')
            ->leftJoin('domains as d', 'd.id', 'invoices.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'invoices.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'invoices.id_vps')
            ->leftJoin('emails as e', 'e.id', 'invoices.id_email')
            ->leftJoin('ssls as s', 's.id', 'invoices.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'invoices.id_website')
            ->select('invoices.*', 'c.name as customer_name',
                'w.code as website_code', 'w.name as website_name',
                's.code as ssl_code', 's.name as ssl_name',
                'e.code as email_code', 'e.name as email_name',
                'v.code as vps_code', 'v.name as vps_name',
                'h.code as hosting_code', 'h.name as hosting_name',
                'd.code as domain_code', 'd.name as domain_name')
            ->whereNull('invoices.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at')
            //dựa theo id của registerservices để lấy thông tin
            ->where('invoices.id', $invoice_id)
            ->first();
    }

//get phiếu thu




    //
    public function getInvoiceReceipt($register_id)
    {
        return $query = Invoice:: leftJoin('customers as c', 'c.id', 'invoices.id_customer')
            ->leftJoin('register_services', 'register_services.id', 'invoices.id_register_service')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('invoices.*', 'c.name as customer_name', 'c.address as customer_address',
                'register_services.start_date as start_date', 'register_services.end_date as end_date',
                'w.name as website_name',
                's.name as ssl_name',
                'e.name as email_name',
                'v.name as vps_name',
                'h.name as hosting_name',
                'd.name as domain_name')
            ->whereNull('register_services.deleted_at')
            ->whereNull('invoices.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at')
            //dựa theo id của registerservices để lấy thông tin
            ->where('invoices.id', $register_id)
            ->first();
    }
}
