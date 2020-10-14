<?php

namespace App\Http\Controllers\Admin;


use App\Business\RegisterServicesLogic;

use App\Business\RegisterSoftLogic;
use App\Helpers\Helper;
use App\Models\ConstantsModel;
use App\Models\Customer;
use App\Models\Domain;

use App\Models\Email;

use App\Models\Hosting;

use App\Models\Invoice;
use App\Models\Receipt;
use App\Models\RegisterService;
use App\Models\RegisterSoft;
use App\Models\Ssl;

use App\Models\User;
use App\Models\VPS;

use App\Models\Website;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RegisterServiceController extends AdminController
{
    const UNDERLINE = '_';

    public function index(Request $request)
    {
        $this->authorize('list-service-management-access');
//        dd($request->all());
        $logic_register_soft = new RegisterSoftLogic();
        $register_softs = $logic_register_soft->Search($request);
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->Search($request);
        $count = count($register_services);
//
    //    dd($register_services);
        return view('admin.register_service.index', compact('register_services', 'register_softs', 'count'));
    }

    public function searchRow(Request $request)
    {
//        dd($request->all());
        $filter = $request->filter;
//        dd($filter);
        switch ($filter) {


            case 1:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchdomain($request);
                $count = count($register_services);
                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }

            case 2:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchvps($request);
                $count = count($register_services);

                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }
            case 3:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchssl($request);
                $count = count($register_services);

                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }
            case 4:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchhosting($request);
                $count = count($register_services);

                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }
            case 5:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchemail($request);
                $count = count($register_services);

                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }
            case 6:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchwebsite($request);
                $count = count($register_services);
                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }
            case 7:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = null;
                $count = 0;
                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = $logic_register_soft->Search($request);
                break;
            }
            default:
            {
                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = $logic_register_soft->Search($request);
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Search($request);
                $count = count($register_services);
                break;
            }
        }
//
//        dd($register_services);
        return view('admin.register_service.search-row', compact('register_services', 'register_softs', 'count'));
    }

    public function getFilter(Request $request)
    {
        $filter = $request->filter;
//        dd($filter);
        switch ($filter) {


            case 1:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchdomain($request);
                $count = count($register_services);
                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }

            case 2:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchvps($request);
                $count = count($register_services);

                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }
            case 3:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchssl($request);
                $count = count($register_services);

                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }
            case 4:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchhosting($request);
                $count = count($register_services);

                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }
            case 5:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchemail($request);
                $count = count($register_services);

                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }
            case 6:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Searchwebsite($request);
                $count = count($register_services);
                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = null;
                break;
            }
            case 7:
            {
                $logic_register_services = new RegisterServicesLogic();
                $register_services = null;
                $count = 0;
                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = $logic_register_soft->Search($request);
                break;
            }
            default:
            {
                $logic_register_soft = new RegisterSoftLogic();
                $register_softs = $logic_register_soft->Search($request);
                $logic_register_services = new RegisterServicesLogic();
                $register_services = $logic_register_services->Search($request);
                $count = count($register_services);
                break;
            }
        }
//        dd($register_services);
        return view('admin.register_service.search-row', compact('register_services', 'register_softs', 'count'));
    }

    public function destroySelect(Request $request)
    {
        try {
            $allsofts = explode(',', $request->allValsDeletesoft[0]);
            $allvals = explode(',', $request->allValsDelete[0]);
            if ($allsofts[0] !== "") {
                foreach ($allsofts as $item) {
                    $register_soft = RegisterSoft::find($item);
                    $register_soft->delete();
                }
                if ($allvals[0] !== "") {
                    $register_service = RegisterService::find($item);
                    $register_service->delete();
                }
                return redirect()->back()->with('success', __('general.delete_success'));
            } else {
                return redirect()->back()->with('fail', 'Vui lòng chọn dòng cần xóa');
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with('fail', __('general.delete_fail'));
        }
    }




// Đăng ký dịch vụ

    //register
    //domain
    public function registerdomain(Request $request)
    {
        $register_service = new RegisterService();
        $customer = Customer::all();
        $domain = Domain::all();
        $staff = User::all();
        return view('admin.register_service.registerdomain', compact('customer', 'staff', 'domain', 'register_service'));
    }

    //hosting
    public function registerhosting(Request $request)
    {
        $register_service = new RegisterService();
        $customer = Customer::all();
        $hosting = Hosting::all();
        $staff = User::all();
        return view('admin.register_service.registerhosting', compact('customer', 'staff', 'hosting', 'register_service'));
    }

    //vps
    public function registervps(Request $request)
    {
        $register_service = new RegisterService();
        $customer = Customer::all();
        $vps = VPS::all();
        $staff = User::all();
        return view('admin.register_service.registervps', compact('customer', 'staff', 'vps', 'register_service'));
    }

    //email
    public function registeremail(Request $request)
    {
        $register_service = new RegisterService();
        $customer = Customer::all();
        $email = Email::all();
        $staff = User::all();
        return view('admin.register_service.registeremail', compact('customer', 'staff', 'email', 'register_service'));
    }

    //ssl
    public function registerssl(Request $request)
    {
        $register_service = new RegisterService();
        $customer = Customer::all();
        $ssl = Ssl::all();
        $staff = User::all();
        return view('admin.register_service.registerssl', compact('customer', 'staff', 'ssl', 'register_service'));
    }

    //website
    public function registerwebsite(Request $request)
    {
        $register_service = new RegisterService();
        $customer = Customer::all();
        $website = Website::all();
        $staff = User::all();
        return view('admin.register_service.registerwebsite', compact('customer', 'staff', 'website', 'register_service'));
    }
//Trong mã code đuôi 01->domain; 02->hosting; 03->vps; 04->email; 05->ssl; 06->website
//Mã code : id khách hàng + id service + tên service + đuôi ^;

    public function addpost(Request $request)
    {
//        dd($request->all());
        $register_service = new RegisterService();
//        $invoice = new Invoice();
        if ($request->id_domain || $request->id_hosting || $request->id_vps || $request->id_email || $request->id_ssl || $request->id_website) {
            if ($request->id_domain) {

                $register_service->rules['start_date'] = 'required';
                $register_service->rules['address_domain1'] = 'required';
                $register_service->message['start_date.required'] = 'Vui lòng nhập ngày bắt đầu cho Domain !';
                $register_service->message['end_date.required'] = 'Vui lòng nhập số tháng sử dụng';
                $register_service->message['address_domain1.required'] = 'Vui lòng nhập địa chỉ miền cho Domain';
            }
            if ($request->id_hosting) {
                $register_service->rules['start_date'] = 'required';
                $register_service->rules['address_domain2'] = 'required';
                $register_service->message['start_date.required'] = 'Vui lòng nhập ngày bắt đầu cho Hosting !';
                $register_service->message['end_date2.required'] = 'Vui lòng nhập ngày kết thúc cho Hosting';
                $register_service->message['address_domain2.required'] = 'Vui lòng nhập địa chỉ miền cho Hosting';
            }
            if ($request->id_vps) {
                $register_service->rules['start_date'] = 'required';
                $register_service->rules['address_domain3'] = 'required';
                $register_service->message['start_date.required'] = 'Vui lòng nhập ngày bắt đầu cho VPS !';
                $register_service->message['end_date3.required'] = 'Vui lòng nhập ngày kết thúc cho VPS';
                $register_service->message['address_domain3.required'] = 'Vui lòng nhập địa chỉ miền cho VPS';
            }
            if ($request->id_email) {
                $register_service->rules['start_date'] = 'required';
                $register_service->rules['address_domain4'] = 'required';
                $register_service->message['start_date.required'] = 'Vui lòng nhập ngày bắt đầu cho Email !';
                $register_service->message['end_date4.required'] = 'Vui lòng nhập ngày kết thúc cho Email';
                $register_service->message['address_domain4.required'] = 'Vui lòng nhập địa chỉ miền cho Email';
            }
            if ($request->id_ssl) {
                $register_service->rules['start_date'] = 'required';
                $register_service->rules['address_domain5'] = 'required';
                $register_service->message['start_date.required'] = 'Vui lòng nhập ngày bắt đầu cho SSl !';
                $register_service->message['end_date5.required'] = 'Vui lòng nhập ngày kết thúc cho SSl';
                $register_service->message['address_domain5.required'] = 'Vui lòng nhập địa chỉ miền cho SSL';
            }
            if ($request->id_website) {
                $register_service->rules['start_date'] = 'required';
                $register_service->rules['address_domain6'] = 'required';
                $register_service->message['start_date.required'] = 'Vui lòng nhập ngày bắt đầu cho Website !';
                $register_service->message['end_date6.required'] = 'Vui lòng nhập ngày kết thúc cho Website';
                $register_service->message['address_domain6.required'] = 'Vui lòng nhập địa chỉ miền cho Website';
            }
        } else {
            $register_service->rules['id_domain'] = 'required';
            $register_service->rules['id_hosting'] = 'required';
            $register_service->rules['id_vps'] = 'required';
            $register_service->rules['id_email'] = 'required';
            $register_service->rules['id_ssl'] = 'required';
            $register_service->rules['id_website'] = 'required';
            $register_service->message['id_domain.required'] = 'Vui lòng chọn dịch vụ cần đăng ký !';
        }

        $validator = $this->validateInput(($request->all()), $register_service->rules, $register_service->message);
//        dd($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
//dd($validator->fails());
        $register_service = new RegisterService();
        $start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        $register_service->start_date = $start_date;
//        dd($request->start_date);
        $date_using = $request->date_using;
        $register_service->date_using = $date_using;
        $month_ = '+' . $date_using . ' month';
        $end_date = date('Y-m-d H:i:s', strtotime($month_, strtotime($start_date)));
        $register_service->end_date = $end_date;
        $register_service->notes = $request->notes;
        $register_service->id_staff = $request->id_staff;
        $register_service->id_customer = $request->id_customer;
        $register_service->transaction = 0;
        $exist_date = date(strtotime($end_date)) - time();
        $register_service->id_staff = Auth::id();
        if ($exist_date < 0) {
            $years = floor(ABS($exist_date) / (365 * 60 * 60 * 24));
            $months = floor((ABS($exist_date) - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor((ABS($exist_date) - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            $register_service->exist_date = "Quá $days-$months-$years";
            $register_service->status = 'Quá hạn';


        } else {
            $years = floor($exist_date / (365 * 60 * 60 * 24));
            $months = floor(($exist_date - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($exist_date - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            $date = floor($exist_date / (60 * 60 * 24));
            if ($date < 30) {
                $register_service->status = "Còn $date";
            } else {
                $register_service->status = 'Đang hoạt động';
            }
            $register_service->exist_date = "Còn $days-$months-$years";

        }
//        dd($years);
        //domain
        if ($request->id_domain != null) {
            $register_service->address_domain = $request->address_domain1;
            $register_service->id_domain = $request->id_domain;
            try {
                $register_service->save();
                $register_service_id = $register_service->id;
                $register_service_update = RegisterService::find($register_service_id);
                $customer = Customer::find($register_service_update->id_customer);
                $domain = Domain::find($register_service_update->id_domain);
                $code = Helper::vnToString($domain->name) . "01";

                if ($register_service_update) {
                    $register_service_code =
                        Helper::generateCodeById($customer->id) . self::UNDERLINE . Helper::generateCodeById($register_service_id) . self::UNDERLINE . $code;
                    try {
                        $register_service_update->update([
                            'code' => $register_service_code,
                        ]);
                    } catch (\Exception $e) {
                        return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
            }
        }

        //hosting
        if ($request->id_hosting != null) {
            $register_service->address_domain = $request->address_domain2;
            $register_service->id_hosting = $request->id_hosting;
            try {
                $register_service->save();
                $register_service_id = $register_service->id;
                $register_service_update = RegisterService::find($register_service_id);
                $customer = Customer::find($register_service_update->id_customer);
                $hosting = Hosting::find($register_service_update->id_hosting);
                $code = Helper::vnToString($hosting->name) . "02";

                if ($register_service_update) {
                    $register_service_code =
                        Helper::generateCodeById($customer->id) . self::UNDERLINE . Helper::generateCodeById($register_service_id) . self::UNDERLINE . $code;
                    try {
                        $register_service_update->update([
                            'code' => $register_service_code,
                        ]);
                    } catch (\Exception $e) {
                        return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
            }

        }
        //vps
        if ($request->id_vps != null) {

            $register_service->address_domain = $request->address_domain3;
            $register_service->id_vps = $request->id_vps;

            try {
                $register_service->save();
                $register_service_id = $register_service->id;

                $register_service_update = RegisterService::find($register_service_id);
                $customer = Customer::find($register_service_update->id_customer);
                $vps = VPS::find($register_service_update->id_vps);
                $code = Helper::vnToString($vps->name) . "03";

                if ($register_service_update) {
                    $register_service_code =
                        Helper::generateCodeById($customer->id) . self::UNDERLINE . Helper::generateCodeById($register_service_id) . self::UNDERLINE . $code;
                    try {
                        $register_service_update->update([
                            'code' => $register_service_code,
                        ]);
                    } catch (\Exception $e) {
                        return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
            }

        }
        //email
        if ($request->id_email != null) {
            $register_service->address_domain = $request->address_domain4;
            $register_service->id_email = $request->id_email;
            try {
                $register_service->save();
                $register_service_id = $register_service->id;

                $register_service_update = RegisterService::find($register_service_id);
                $customer = Customer::find($register_service_update->id_customer);
                $email = Email::find($register_service_update->id_email);
                $code = Helper::vnToString($email->name) . "04";


                if ($register_service_update) {
                    $register_service_code =
                        Helper::generateCodeById($customer->id) . self::UNDERLINE . Helper::generateCodeById($register_service_id) . self::UNDERLINE . $code;
                    try {
                        $register_service_update->update([
                            'code' => $register_service_code,
                        ]);
                    } catch (\Exception $e) {
                        return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
            }

        }
        //ssl
        if ($request->id_ssl != null) {
            $register_service->address_domain = $request->address_domain5;
            $register_service->id_ssl = $request->id_ssl;

            try {
                $register_service->save();
                $register_service_id = $register_service->id;

                $register_service_update = RegisterService::find($register_service_id);
                $customer = Customer::find($register_service_update->id_customer);
                $ssl = Ssl::find($register_service_update->id_ssl);
                $code = Helper::vnToString($ssl->name) . "05";

                if ($register_service_update) {
                    $register_service_code =
                        Helper::generateCodeById($customer->id) . self::UNDERLINE . Helper::generateCodeById($register_service_id) . self::UNDERLINE . $code;
                    try {
                        $register_service_update->update([
                            'code' => $register_service_code,
                        ]);
                    } catch (\Exception $e) {
                        return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
            }

        }
        //website
        if ($request->id_website != null) {
            $register_service->address_domain = $request->address_domain6;
            $register_service->id_website = $request->id_website;
            try {
                $register_service->save();
                $register_service_id = $register_service->id;

                $register_service_update = RegisterService::find($register_service_id);
                $customer = Customer::find($register_service_update->id_customer);
                $website = Website::find($register_service_update->id_website);
                $code = Helper::vnToString($website->name) . "06";

                if ($register_service_update) {
                    $register_service_code =
                        Helper::generateCodeById($customer->id) . self::UNDERLINE . Helper::generateCodeById($register_service_id) . self::UNDERLINE . $code;
                    try {
                        $register_service_update->update([
                            'code' => $register_service_code,
                        ]);
                    } catch (\Exception $e) {
                        return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
            }

        }
        return redirect(route('admin.order.services'))->with('success', 'Thành công');

    }


// search
    public function search(Request $request)
    {
//        dd($request->all());
        $logic_register_soft = new RegisterSoftLogic();
        $register_softs = $logic_register_soft->search($request);
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->Search($request);
        $register_services->appends(['name' => $request->name]);
        $count = count($register_services);
        return view('admin.register_service.index', compact('register_services', 'register_softs', 'count'));
    }

//gia hạn dịch vụ
    public function extend(Request $request)
    {
        $register_service = RegisterService::find($request->id);
        $services = ConstantsModel::SERVICES;
        $customer = Customer::find($register_service->id_customer);
        $domain = Domain::all();
        $hosting = Hosting::all();
        $vps = VPS::all();
        $email = Email::all();
        $ssl = Ssl::all();
        $website = Website::all();
        return view('admin.register_service.extend', compact('services', 'register_service', 'customer', 'domain', 'hosting', 'vps', 'email', 'ssl', 'website'));

    }

//gia hạn dịch vụ- cập nhật lại ngày kết thúc chuyển trạng thái thành gia hạn.
    public function storeextend(Request $request)
    {
        $register_service = RegisterService::find($request->id);

        $register_service->transaction = 1;


        if ($request->id_domain || $request->id_hosting || $request->id_vps || $request->id_email || $request->id_ssl || $request->id_website) {

        } else {
            $register_service->rules['id_domain'] = 'required';
            $register_service->rules['id_hosting'] = 'required';
            $register_service->rules['id_vps'] = 'required';
            $register_service->rules['id_email'] = 'required';
            $register_service->rules['id_ssl'] = 'required';
            $register_service->rules['id_website'] = 'required';
            $register_service->message['id_domain.required'] = 'Vui lòng chọn dịch vụ cần đăng ký !';
        }
        $validator = $this->validateInput($request->all(), $register_service->rules, $register_service->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $request['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $request['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));

        $exist_date = date(strtotime($request->end_date)) - time();

        if ($exist_date < 0) {
            $years = floor(ABS($exist_date) / (365 * 60 * 60 * 24));
            $months = floor((ABS($exist_date) - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor((ABS($exist_date) - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            $request['exist_date'] = "Quá $days-$months-$years";
            $register_service->status = 'Quá hạn';
        } else {
            $years = floor($exist_date / (365 * 60 * 60 * 24));
            $months = floor(($exist_date - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($exist_date - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            $date = floor($exist_date / (60 * 60 * 24));
            if ($date < 30) {
                $register_service->status = "Còn $date";
            } else {
                $register_service->status = 'Đang hoạt động';
            }
            $request['exist_date'] = "Còn $days-$months-$years";

        }
        $request['id_staff'] = Auth::id();
        $register_service->fill($request->all());


        try {
//            dd($register_service);
            $register_service->save();

            $register_service_id = $register_service->id;
            $register_service_update = RegisterService::find($register_service_id);

            //domain_code ttt
            if ($register_service->id_domain) {
                $domain_service = Domain::find($register_service->id_domain);
                $code = Helper::vnToString($domain_service->name) . "01";
            } else {
                $domain_code = '';
            }
            //hosting_code
            if ($register_service->id_hosting) {
                $hosting_service = Hosting::find($register_service->id_hosting);
                $code = Helper::vnToString($hosting_service->name) . "02";
            } else {
                $hosting_code = '';
            }
            //vps_code
            if ($register_service->id_vps) {
                $vps_service = VPS::find($register_service->id_vps);
                $code = Helper::vnToString($vps_service->name) . "03";
            } else {
                $vps_code = '';
            }
            //email_code
            if ($register_service->id_email) {
                $email_service = Email::find($register_service->id_email);
                $code = Helper::vnToString($email_service->name) . "04";
            } else {
                $email_code = '';
            }
            //ssl_code
            if ($register_service->id_ssl) {
                $ssl_service = Ssl::find($register_service->id_ssl);
                $code = Helper::vnToString($ssl_service->name) . "05";
            } else {
                $ssl_code = '';
            }
            //website_code
            if ($register_service->id_website) {
                $website_service = Website::find($register_service->id_website);
                $code = Helper::vnToString($website_service->name) . "06";
            } else {
                $website_code = '';
            }
            //
            $id_customer = $register_service_update->id_customer;
            $customer = Customer::find($id_customer);

            if ($register_service_update) {
                $register_service_code =
                    Helper::generateCodeById($customer->id) . self::UNDERLINE . Helper::generateCodeById($register_service_id) . self::UNDERLINE . $code;

                try {
                    $register_service_update->update([
                            'code' => $register_service_code,

                        ]

                    );


                } catch (\Exception $e) {
                    return redirect(route('admin.register-services.index'))->with('fail', 'Thất Bại');
                }
            }

            return redirect(route('admin.order.services'))->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect(route('admin.order.services'))->with('fail', 'Thất Bại');
        }
    }

//chỉnh sửa trang danh sách đăng ký
    public function entry(Request $request)
    {

        $register_service = RegisterService::find($request->id);
        $services = ConstantsModel::SERVICES;
        $customer = Customer::find($register_service->id_customer);
        $domain = Domain::all();
        $hosting = Hosting::all();
        $vps = VPS::all();
        $email = Email::all();
        $ssl = Ssl::all();
        $website = Website::all();
        return view('admin.register_service.edit-add', compact('services', 'register_service', 'customer', 'domain', 'hosting', 'vps', 'email', 'ssl', 'website'));
    }

    public function store(Request $request)
    {

        $register_service = RegisterService::find($request->id);
        if ($request->id_domain || $request->id_hosting || $request->id_vps || $request->id_email || $request->id_ssl || $request->id_website) {

        } else {
            $register_service->rules['id_domain'] = 'required';
            $register_service->rules['id_hosting'] = 'required';
            $register_service->rules['id_vps'] = 'required';
            $register_service->rules['id_email'] = 'required';
            $register_service->rules['id_ssl'] = 'required';
            $register_service->rules['id_website'] = 'required';
            $register_service->message['id_domain.required'] = 'Vui lòng chọn dịch vụ cần đăng ký !';
        }
        $validator = $this->validateInput($request->all(), $register_service->rules, $register_service->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $request['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $request['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));

        $exist_date = date(strtotime($request->end_date)) - time();

        if ($exist_date < 0) {
            $years = floor(ABS($exist_date) / (365 * 60 * 60 * 24));
            $months = floor((ABS($exist_date) - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor((ABS($exist_date) - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            $request['exist_date'] = "Quá $days-$months-$years";
            $register_service->status = 'Quá hạn';
        } else {
            $years = floor($exist_date / (365 * 60 * 60 * 24));
            $months = floor(($exist_date - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($exist_date - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            $date = floor($exist_date / (60 * 60 * 24));
            if ($date < 30) {
                $register_service->status = "Còn $date";
            } else {
                $register_service->status = 'Đang hoạt động';
            }
            $request['exist_date'] = "Còn $days-$months-$years";

        }
        $request['id_staff'] = Auth::id();
        $register_service->fill($request->all());


        try {
//            dd($register_service);
            $register_service->save();

            $register_service_id = $register_service->id;
            $register_service_update = RegisterService::find($register_service_id);

            //domain_code ttt
            if ($register_service->id_domain) {
                $domain_service = Domain::find($register_service->id_domain);
                $code = Helper::vnToString($domain_service->name) . "01";
            } else {
                $domain_code = '';
            }
            //hosting_code
            if ($register_service->id_hosting) {
                $hosting_service = Hosting::find($register_service->id_hosting);
                $code = Helper::vnToString($hosting_service->name) . "02";
            } else {
                $hosting_code = '';
            }
            //vps_code
            if ($register_service->id_vps) {
                $vps_service = VPS::find($register_service->id_vps);
                $code = Helper::vnToString($vps_service->name) . "03";
            } else {
                $vps_code = '';
            }
            //email_code
            if ($register_service->id_email) {
                $email_service = Email::find($register_service->id_email);
                $code = Helper::vnToString($email_service->name) . "04";
            } else {
                $email_code = '';
            }
            //ssl_code
            if ($register_service->id_ssl) {
                $ssl_service = Ssl::find($register_service->id_ssl);
                $code = Helper::vnToString($ssl_service->name) . "05";
            } else {
                $ssl_code = '';
            }
            //website_code
            if ($register_service->id_website) {
                $website_service = Website::find($register_service->id_website);
                $code = Helper::vnToString($website_service->name) . "06";
            } else {
                $website_code = '';
            }
            //
            $id_customer = $register_service_update->id_customer;
            $customer = Customer::find($id_customer);

            if ($register_service_update) {
                $register_service_code =
                    Helper::generateCodeById($customer->id) . self::UNDERLINE . Helper::generateCodeById($register_service_id) . self::UNDERLINE . $code;

                try {
                    $register_service_update->update([
                        'code' => $register_service_code,
                    ]);
                } catch (\Exception $e) {
                    return redirect(route('admin.register-services.index'))->with('fail', 'Thất Bại');
                }
            }

            return redirect(route('admin.register-services.index'))->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect(route('admin.register-services.index'))->with('fail', 'Thất Bại');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $register_service = RegisterService::find($request->id);
            if ($register_service == null) {
                throw new \Exception();
            }
            $register_service->delete();
            return redirect()->route('admin.register-services.index')->with('success', 'Thành Công');

        } catch (\Exception $e) {
            return redirect()->route('admin.register-services.index')->with('fail', 'Thất Bại');
        }
    }
}
