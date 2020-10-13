<?php


namespace App\Http\Controllers\Admin;


use App\Business\RegisterServicesLogic;
use App\Business\RegisterSoftLogic;

use App\Helpers\Helper;
use App\Models\ConstantsModel;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Receipt;
use App\Models\RegisterService;
use App\Models\RegisterSoft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends AdminController
{

    const UNDERLINE = '_';

    public function services(Request $request)
    {
        $this->authorize('order-service-access');
        $transaction_services = ConstantsModel::TRANSACTION_SERVICES;
        $logic_register_services = new RegisterServicesLogic();

        $key = isset($request->key) ? $request->key : '';
        $register_services = $logic_register_services->getListRegisterServices($key, 10);
        if (isset($request->amount)) {
            $register_services = $logic_register_services->getListRegisterServices($key, $request->amount);        }

        return view('admin.order.index_services', compact('register_services', 'transaction_services'));
    }

    public function searchRow(Request $request)
    {
        $transaction_services = ConstantsModel::TRANSACTION_SERVICES;
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->getListRegisterServices($request->key, 10);
        if ($request->amount !== null) {
            $register_services = $logic_register_services->getListRegisterServices($request->key, $request->amount);
        }
        return view('admin.order.service_row', compact('register_services', 'transaction_services'));
    }
    public function destroySelect(Request $request)
    {
        try {
            $allVals = explode(',', $request->allValsDelete[0]);
            if($allVals[0]!=="") {
                foreach ($allVals as $item) {
                    $register_service = RegisterService::find($item);
                    $register_service->delete();
                }
                return redirect()->back()->with('success', __('general.delete_success'));
            }
            else{
                return redirect()->back()->with('fail', 'Vui lòng chọn dòng cần xóa');
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with('fail', __('general.delete_fail'));
        }
    }
// cập nhật transaction
    public function updatetservices(Request $request)
    {
        //$update = RegisterService::find($request->id);

        $update = RegisterService::
        leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*',
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
                'd.id as domain_id',
                'd.fee_register as domain_fee_register',
                'd.fee_remain as domain_fee_remain',
                'd.fee_tranformation as domain_fee_tranformation')
            ->findOrFail($request->id);
//        $update->start_date=now();
        $update->update($request->all());
        $exist_date = date(strtotime($update->end_date)) - date(strtotime($update->start_date));
        $years = floor($exist_date / (365 * 60 * 60 * 24));
        if ($update->transaction == 2) {
            $invoice = new Invoice();
            $invoice->id_register_service = $update->id;
            $invoice->id_customer = $update->id_customer;
            $invoice->id_staff=Auth::id();
            $invoice->price = $update->softwares_price;
            $invoice->date = now();
            $invoice->VAT_price = '10%';
            $invoice->description = "Đã thanh toán";

            if ($years > 1) {
                if ($update->id_hosting !== null && $update->id_website === null) {
                    $total= $update->hosting_price * (int)$years;
                    $invoice->price=$total;
                    $invoice->order_type = "thu tiền dịch vụ $update->hosting_name";
                    $invoice->total = $total + $total * 10 / 100;
                } elseif ($update->id_vps !== null && $update->id_website === null) {
                    $total=$update->vps_price * (int)$years;
                    $invoice->price = $total;
                    $invoice->total = $total + $total * 10 / 100;
                    $invoice->order_type = "thu tiền dịch vụ $update->vps_name";
                } elseif ($update->id_email !== null && $update->id_website === null) {
                    $total=$update->email_price * (int)$years;
                    $invoice->price = $total;
                    $invoice->total = $total + $total * 10 / 100;
                    $invoice->order_type = "thu tiền dịch vụ $update->email_name";
                } elseif ($update->id_ssl !== null && $update->id_website === null) {
                    $total=$update->ssl_price * (int)$years;
                    $invoice->price = $total;
                    $invoice->total = $total + $total * 10 / 100;
                    $invoice->order_type = "thu tiền dịch vụ $update->ssl_name";
                } elseif ($update->id_domain !== null && $update->id_website === null) {
                    $total=$update->domain_fee_register + $update->domain_fee_remain * ((int)$years - 1);
                    $invoice->price = $total;
                    $invoice->total = $total + $total * 10 / 100;
                    $invoice->order_type = "thu tiền dịch vụ $update->domain_name";
                } else {
                    $total=$update->website_price * (int)$years;
                    $invoice->price = $total;
                    $invoice->total = $total + $total * 10 / 100;
                    $invoice->order_type = "thu tiền dịch vụ $update->website_name";
                }

            } else {
                if ($update->id_hosting !== null && $update->id_website === null) {
                    $total= $update->hosting_price;
                    $invoice->price=$total;
                    $invoice->order_type = "thu tiền dịch vụ $update->hosting_name";
                    $invoice->total = $total + $total * 10 / 100;
                } elseif ($update->id_vps !== null && $update->id_website === null) {
                    $total=$update->vps_price;
                    $invoice->price = $total;
                    $invoice->total = $total + $total * 10 / 100;
                    $invoice->order_type = "thu tiền dịch vụ $update->vps_name";
                } elseif ($update->id_email !== null && $update->id_website === null) {
                    $total=$update->email_price;
                    $invoice->price = $total;
                    $invoice->total = $total + $total * 10 / 100;
                    $invoice->order_type = "thu tiền dịch vụ $update->email_name";
                } elseif ($update->id_ssl !== null && $update->id_website === null) {
                    $total=$update->ssl_price;
                    $invoice->price = $total;
                    $invoice->total = $total + $total * 10 / 100;
                    $invoice->order_type = "thu tiền dịch vụ $update->ssl_name";
                } elseif ($update->id_domain !== null && $update->id_website === null) {
                    $total=$update->domain_fee_register ;
                    $invoice->price = $total;
                    $invoice->total = $total + $total * 10 / 100;
                    $invoice->order_type = "thu tiền dịch vụ $update->domain_name";
                } else {
                    $total=$update->website_price;
                    $invoice->price = $total;
                    $invoice->total = $total + $total * 10 / 100;
                    $invoice->order_type = "thu tiền dịch vụ $update->website_name";
                }

            }
        }

//            dd($ten);
//            $invoice->order_type = "thu tiền dịch vụ $ten";
        $invoice->save();
        $sw = RegisterService::find($request->id);
        $customer = Customer::find($sw->id_customer);
        $code_bill = Helper::generateCodeById($invoice->id_register_service) . self::UNDERLINE . 'SV';
        $invoice_update = Invoice::find($invoice->id);
        if ($invoice_update->id) {

            $code_invoice = Helper::generateCodeById($customer->id) . self::UNDERLINE . Helper::generateCodeById($invoice_update->id) . self::UNDERLINE . $code_bill;
            try {
                $invoice_update->update([
                    'code' => $code_invoice,
                ]);
                return redirect(route('admin.order.services'))->with('success', 'Thành Công');
            } catch (\Exception $e) {
                return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
            }
        }

        return back();
    }





    public function software(Request $request)
    {
        $this->authorize('order-software-access');
        $key = isset($request->key) ? $request->key : '';
        $transaction_soft = ConstantsModel::TRANSACTION_SERVICES;
        $logic_register_soft = new RegisterSoftLogic();
        $register_softs = $logic_register_soft->getlistregistersoft($key, 10);
        if ($request->amount !== null) {
            $register_softs = $logic_register_soft->getlistregistersoft($key, $request->amount);
        }

        return view('admin.order.index_software', compact('transaction_soft', 'register_softs'));
    }

    public function searchRowSoft(Request $request)
    {
        $transaction_soft = ConstantsModel::TRANSACTION_SERVICES;
        $logic_register_soft = new RegisterSoftLogic();
        $register_softs = $logic_register_soft->getlistregistersoft($request->key, 10);
        if ($request->amount !== null) {
            $register_softs = $logic_register_soft->getlistregistersoft($request->key, $request->amount);
        }
        return view('admin.order.soft_row', compact('transaction_soft', 'register_softs'));


    }

    public function destroySelectSoft(Request $request)
    {
        try {
            $allVals = explode(',', $request->allValsDelete[0]);
            if($allVals[0]!=="") {
                foreach ($allVals as $item) {
                    $register_soft = RegisterSoft::find($item);
                    $register_soft->delete();
                }
                return redirect()->back()->with('success', __('general.delete_success'));
            }
            else{
                return redirect()->back()->with('fail', 'Vui lòng chọn dòng cần xóa');
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with('fail', __('general.delete_fail'));
        }
    }

    public function updatetssoft(Request $request)
    {

        $update = RegisterSoft::
        join('softwares as sw', 'sw.id', 'register_soft.id_software')
            ->join('typesoftwares as ts', 'ts.id', 'register_soft.id_typesoftware')
            ->join('users as u', 'u.id', 'register_soft.id_staff')
            ->select('register_soft.*', 'sw.name as software',
                'ts.name as typesoftware', 'u.name as staff_name',
                'sw.price as softwares_price')
            ->find($request->id);
//        $update->start_date=now();
//        dd($request->all());
        $update->update(['transaction' => $request->transaction]);
        $exist_date = date(strtotime($update->end_date)) - date(strtotime($update->start_date));
        $years = floor($exist_date / (365 * 60 * 60 * 24));
        $months = floor(($exist_date - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($exist_date - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $date = floor($exist_date / (60 * 60 * 24));
//        dd($date);
        if ($update->transaction == 2 && $date > 15) {

            $invoice = new Invoice();
            $invoice->id_register_soft = $update->id;
            $invoice->id_staff=Auth::id();
            $invoice->id_customer = $update->id_customer;
            $invoice->price = $update->softwares_price;
            $invoice->date = now();
            $invoice->VAT_price = '10%';
            if ($years > 1) {
                $total = (int)$update->softwares_price * (int)$years;
            } else {
                $total = (int)$update->softwares_price;
            }
            $invoice->total = $total + $total * 10 / 100;
            $invoice->description = "Đã thanh toán";
            $ten = $update->software;
            $invoice->order_type = "thu tiền phần mềm $ten";
            $invoice->save();
            $sw = RegisterSoft::find($request->id);
            $customer = Customer::find($sw->id_customer);
            $code_bill = Helper::generateCodeById($invoice->id_register_soft) . self::UNDERLINE . 'SW';
            $invoice_update = Invoice::find($invoice->id);
            if ($invoice_update->id) {

                $code_invoice = Helper::generateCodeById($customer->id) . self::UNDERLINE . Helper::generateCodeById($invoice_update->id) . self::UNDERLINE . $code_bill;
                try {
                    $invoice_update->update([
                        'code' => $code_invoice,
                    ]);
                    return redirect(route('admin.order.software'))->with('success', 'Thành Công');
                } catch (\Exception $e) {
                    return redirect(route('admin.order.software'))->with('fail', 'Thất Bại');
                }
            }
        }


        return back();
    }


}
