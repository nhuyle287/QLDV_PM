<?php

namespace App\Http\Controllers\Admin;

use App\Business\RegisterServicesLogic;
use App\Business\InvoiceLogic;
use App\Model\ConstantsModel;
use App\Model\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class InvoiceController extends AdminController
{
    //
    public function index(Request $request){
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->getListRegisterServices();
//        $invoices = Invoice::paginate(Config::get('constants.pagination'));
        $status = ConstantsModel::INVOICE;

        return view('admin.invoice.index', compact('register_services','status'));
    }
    public function show(Request $request)
    {
        $logic_register_services = new  RegisterServicesLogic();
        $register_service = $logic_register_services->getIndexRegisterServices($request->id);

        $customer_name = $register_service->customer_name;

        return view('admin.invoice.show', compact('register_service', 'customer_name'));
    }


}
