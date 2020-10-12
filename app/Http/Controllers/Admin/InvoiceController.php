<?php

namespace App\Http\Controllers\Admin;

use App\Business\RegisterServicesLogic;
use App\Business\InvoiceLogic;
use App\Business\RegisterSoftLogic;
use App\charts\SampleChart;
use App\Models\ConstantsModel;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Receipt;
use App\Models\payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class InvoiceController extends AdminController
{

      public function show(Request $request)
    {
        $logic_register_services = new  RegisterServicesLogic();
        $register_service = $logic_register_services->getIndexRegisterServices($request->id);
        $customer_name = $register_service->customer_name;
        return view('admin.invoice.show', compact('register_service', 'customer_name'));
    }

    //xuất phiếu thu
    public function invoiceservices(Request $request)
    {
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->getListRegisterServices();
//        $invoices = Invoice::paginate(Config::get('constants.pagination'));
        $status = ConstantsModel::INVOICE;

        return view('admin.invoice.index', compact('register_services', 'status'));
    }

    public function invoicesoft(Request $request)
    {
        $logic_register_services = new RegisterSoftLogic();
        $register_services = $logic_register_services->getlistregistersoft();
//        $invoices = Invoice::paginate(Config::get('constants.pagination'));
        $status = ConstantsModel::INVOICE;
        return view('admin.invoice.index', compact('register_services', 'status'));
    }

//danh sách sổ quỹ
    public function receipts(Request $request)
    {
        $search = $request->input('search');

        $transaction_soft = ConstantsModel::TRANSACTION_SERVICES;
        $logic_register_services = new InvoiceLogic();
        $register_services = $logic_register_services->getListServices($search);
        $newvl = new InvoiceLogic();
        $values = [$newvl->totalprice(1), $newvl->totalprice(2), $newvl->totalprice(3)
            , $newvl->totalprice(4), $newvl->totalprice(5), $newvl->totalprice(6)
            , $newvl->totalprice(7), $newvl->totalprice(8), $newvl->totalprice(9)
            , $newvl->totalprice(10), $newvl->totalprice(11), $newvl->totalprice(12)];
        $total_ = Invoice::sum('total');
        $labels = Invoice::pluck('created_at');
//        $labels=date('d-m-y',strtotime($labels));explode(" ",created_at)
        $chart = new SampleChart();
        $chart->labels(['Tháng1', 'Tháng2', 'Tháng3', 'Tháng4', 'Tháng5', 'Tháng6', 'Tháng7', 'Tháng8', 'Tháng9', 'Tháng10', 'Tháng11', 'Tháng12']);
//        $chart->labels($labels);
        $chart->dataset('Quỹ', 'line', $values)->color("rgb(0,128,128)");
        return view('admin.invoice.receipts', compact('register_services', 'transaction_soft', 'chart', 'total_'));
    }

    public function addreceipts()
    {
        $customer = Customer::all();
        return view('admin.invoice.add-receipt', compact('customer'));
    }

    public function receiptsstore(Request $request)
    {
//        dd($request->all());
        //tạo mới đối tượng khi không có request( request trả về null)
        $cus = new Customer();
        $register_service = new Invoice();
        $custom = db::table('customers')->where('email', '=', $request->email)->whereNull('deleted_at')->first();
        if ($request->id) {
            $register_service = Invoice::find($request->id);
            $cus = Customer::find($register_service->id_customer);

        }
        if ($cus->email === $request->email) {
            $register_service->rules['email'] = 'required|email|unique:customers,email,' . $register_service->id_customer;
            $register_service->message['start_date.unique'] = 'Email đã tồn tai !';
        }

        $validator = $this->validateInput($request->all(), $register_service->rules, $register_service->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        if ($custom === null && $request->id === null) {
            $cus->name = $request->name;
            $cus->email = $request->email;
            $cus->address = $request->address;
            $cus->phone_number = $request->phone_number;
            $register_service->date = now()->format('Y/m/d H:i:s');
            $register_service->total = $request->total;
            $register_service->order_type = $request->order_type;
            $register_service->description = $request->description;
        } elseif ($custom !== null && $request->id === null) {
            $register_service->id_customer = $custom->id;
            $register_service->date = now();
            $register_service->total = $request->total;
            $register_service->order_type = $request->order_type;
            $register_service->description = $request->description;
        }

        $register_service->id_staff = Auth::id();

//        $request['order_type']

        try {
            if ($custom === null && $request->id === null) {
                $cus->save();
                $register_service->save();
                $invoice_update = Invoice::find($register_service->id);
                if ($invoice_update->id) {
                    $invoice_update->update(['id_customer' => $cus->id]);
                }
            } elseif ($custom !== null && $request->id === null) {
                $register_service->save();
            } else {
                $invoice_update = Invoice::find($request->id);
                $cus_update = Customer::find($invoice_update->id_customer);
                if ($invoice_update->id) {
                    $invoice_update->update(['total' => $request->total, 'order_type' => $request->order_type,
                        'description' => $request->description]);
                    $cus_update->update(['name' => $request->name, 'phone_number' => $request->phone_number, 'email' => $request->email, 'address' => $request->address]);
                }
            }

            return redirect(route('admin.invoices.receipts'))->with('success', 'Success');
        } catch (\Exception $e) {
            return redirect(route('admin.invoices.receipts'))->with('fail', 'Fail');

        }
    }

    public function invocereceipt(Request $request)
    {
        $logic_register_services = new  InvoiceLogic();
        $register_service = $logic_register_services->getInvoiceReceipt($request->id);
        return view('admin.invoice.invoice-receipt', compact('register_service'));
    }


}
