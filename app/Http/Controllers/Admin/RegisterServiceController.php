<?php

namespace App\Http\Controllers\Admin;

use App\Business\HostingServicesLogin;
use App\Business\RegisterServicesLogic;
use App\Business\DomainServicesLogin;
use App\Helpers\Helper;
use App\Model\ConstantsModel;
use App\Model\Customer;
use App\Model\Domain;

use App\Model\Email;

use App\Model\Hosting;

use App\Model\RegisterService;
use App\Model\Ssl;

use App\Model\VPS;

use App\Model\Website;

use Cassandra\Custom;
use Egulias\EmailValidator\Exception\DotAtEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RegisterServiceController extends AdminController
{
    const UNDERLINE = '_';

    public function index()
    {
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->getListRegisterServices();

        return view('admin.register_service.index', compact('register_services'));
    }

//    Fix bug
    public function show(Request $request)
    {
        $logic_register_services = new  RegisterServicesLogic();
        $register_service = $logic_register_services->getIndexRegisterServices($request->id);

        $customer_name = $register_service->customer_name;

        return view('admin.register_service.show', compact('register_service', 'customer_name'));
    }


    public function addget(Request $request)
    {


        $customer = Customer::all();
        $domain = Domain::all();
        $hosting = Hosting::all();
        $vps = VPS::all();
        $email = Email::all();
        $ssl = Ssl::all();
        $website = Website::all();
        return view('admin.register_service.add', compact('customer', 'domain', 'hosting', 'vps', 'email', 'ssl', 'website'));
    }
//Trong mã code đuôi 01->domain; 02->hosting; 03->vps; 04->email; 05->ssl; 06->website
//Mã code : id khách hàng + id service + tên service + đuôi ^;

    public function addpost(Request $request)
    {
        $register_service = new RegisterService();

        if ($request->id_domain || $request->id_hosting || $request->id_vps || $request->id_email || $request->id_ssl || $request->id_website) {
            if ($request->id_domain) {

                $register_service->rules['start_date'] = 'required';
                $register_service->rules['end_date'] = 'required';
                $register_service->rules['address_domain1'] = 'required';
                $register_service->message['start_date.required'] = 'Vui lòng nhập ngày bắt đầu cho Domain !';
                $register_service->message['end_date.required'] = 'Vui lòng nhập ngày kết thúc cho Domain';
                $register_service->message['address_domain1.required'] = 'Vui lòng nhập địa chỉ miền cho Domain';
            }
            if ($request->id_hosting) {
                $register_service->rules['start_date2'] = 'required';
                $register_service->rules['end_date2'] = 'required';
                $register_service->rules['address_domain2'] = 'required';
                $register_service->message['start_date2.required'] = 'Vui lòng nhập ngày bắt đầu cho Hosting !';
                $register_service->message['end_date2.required'] = 'Vui lòng nhập ngày kết thúc cho Hosting';
                $register_service->message['address_domain2.required'] = 'Vui lòng nhập địa chỉ miền cho Hosting';
            }
            if ($request->id_vps) {
                $register_service->rules['start_date3'] = 'required';
                $register_service->rules['end_date3'] = 'required';
                $register_service->rules['address_domain3'] = 'required';
                $register_service->message['start_date3.required'] = 'Vui lòng nhập ngày bắt đầu cho VPS !';
                $register_service->message['end_date3.required'] = 'Vui lòng nhập ngày kết thúc cho VPS';
                $register_service->message['address_domain3.required'] = 'Vui lòng nhập địa chỉ miền cho VPS';
            }
            if ($request->id_email) {
                $register_service->rules['start_date4'] = 'required';
                $register_service->rules['end_date4'] = 'required';
                $register_service->rules['address_domain4'] = 'required';
                $register_service->message['start_date4.required'] = 'Vui lòng nhập ngày bắt đầu cho Email !';
                $register_service->message['end_date4.required'] = 'Vui lòng nhập ngày kết thúc cho Email';
                $register_service->message['address_domain4.required'] = 'Vui lòng nhập địa chỉ miền cho Email';
            }
            if ($request->id_ssl) {
                $register_service->rules['start_date5'] = 'required';
                $register_service->rules['end_date5'] = 'required';
                $register_service->rules['address_domain5'] = 'required';
                $register_service->message['start_date5.required'] = 'Vui lòng nhập ngày bắt đầu cho SSl !';
                $register_service->message['end_date5.required'] = 'Vui lòng nhập ngày kết thúc cho SSl';
                $register_service->message['address_domain5.required'] = 'Vui lòng nhập địa chỉ miền cho SSL';
            }
            if ($request->id_website) {
                $register_service->rules['start_date6'] = 'required';
                $register_service->rules['end_date6'] = 'required';
                $register_service->rules['address_domain6'] = 'required';
                $register_service->message['start_date6.required'] = 'Vui lòng nhập ngày bắt đầu cho Website !';
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


        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        //domain
        if ($request->id_domain != null) {
            $register_service = new RegisterService();
            $register_service->start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
            $register_service->end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
            $register_service->notes = $request->notes;
            $register_service->address_domain = $request->address_domain1;
            $register_service->id_customer = $request->id_customer;
            $register_service->id_domain = $request->id_domain;
            $exist_date = date(strtotime($request->end_date)) - time();

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
            try {
                $register_service->save();
                $register_service_id = $register_service->id;
                $register_service_update = RegisterService::find($register_service_id);
                $customer = Customer::find($register_service_update->id_customer);
                $domain = Domain::find($register_service_update->id_domain);
                $code = Helper::vnToString($domain->name) . "01";

                if ($register_service_update) {
                    $register_service_code =
                        Helper::vnToString($customer->name) . self::UNDERLINE . Helper::generateCodeById($register_service_id) . self::UNDERLINE . Helper::generateCodeById($register_service_update->id_domain);
                    try {
                        $register_service_update->update([
                            'code' => $register_service_code,
                        ]);
                    } catch (\Exception $e) {
                        return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
            }


        }

        //hosting
        if ($request->id_hosting != null) {
            $register_service = new RegisterService();

            $register_service->start_date = date('Y-m-d H:i:s', strtotime($request->start_date2));
            $register_service->end_date = date('Y-m-d H:i:s', strtotime($request->end_date2));
            $register_service->notes = $request->notes;
            $register_service->address_domain = $request->address_domain2;
            $register_service->id_customer = $request->id_customer;
            $register_service->id_hosting = $request->id_hosting;
            $exist_date = date(strtotime($request->end_date2)) - time();

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
                        return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
            }

        }
        //vps
        if ($request->id_vps != null) {
            $register_service = new RegisterService();

            $register_service->start_date = date('Y-m-d H:i:s', strtotime($request->start_date3));
            $register_service->end_date = date('Y-m-d H:i:s', strtotime($request->end_date3));
            $register_service->notes = $request->notes;
            $register_service->address_domain = $request->address_domain3;
            $register_service->id_customer = $request->id_customer;
            $register_service->id_vps = $request->id_vps;
            $exist_date = date(strtotime($request->end_date3)) - time();

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
                        return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
            }

        }
        //email
        if ($request->id_email != null) {
            $register_service = new RegisterService();

            $register_service->start_date = date('Y-m-d H:i:s', strtotime($request->start_date4));
            $register_service->end_date = date('Y-m-d H:i:s', strtotime($request->end_date4));
            $register_service->notes = $request->notes;
            $register_service->address_domain = $request->address_domain4;
            $register_service->id_customer = $request->id_customer;
            $register_service->id_email = $request->id_email;
            $exist_date = date(strtotime($request->end_date4)) - time();

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
                        return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
            }

        }
        //ssl
        if ($request->id_ssl != null) {
            $register_service = new RegisterService();

            $register_service->start_date = date('Y-m-d H:i:s', strtotime($request->start_date5));
            $register_service->end_date = date('Y-m-d H:i:s', strtotime($request->end_date5));
            $register_service->notes = $request->notes;
            $register_service->address_domain = $request->address_domain5;
            $register_service->id_customer = $request->id_customer;
            $register_service->id_ssl = $request->id_ssl;
            $exist_date = date(strtotime($request->end_date5)) - time();

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
                        return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
            }

        }
        //website
        if ($request->id_website != null) {
            $register_service = new RegisterService();

            $register_service->start_date = date('Y-m-d H:i:s', strtotime($request->start_date6));
            $register_service->end_date = date('Y-m-d H:i:s', strtotime($request->end_date6));
            $register_service->notes = $request->notes;
            $register_service->address_domain = $request->address_domain6;
            $register_service->id_customer = $request->id_customer;
            $register_service->id_website = $request->id_website;
            $exist_date = date(strtotime($request->end_date6)) - time();

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
                        return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
                    }
                }

            } catch (\Exception $e) {
                return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
            }

        }
        return redirect(route('admin.register_services.index'))->with('success', 'Thành công');

    }
//register
    //domain
    public function registerdomain(Request $request)
    {
        $register_service = new RegisterService();
        $customer = Customer::all();
        $domain = Domain::all();

        return view('admin.register_service.registerdomain', compact('customer', 'domain', 'register_service'));
    }

    //hosting
    public function registerhosting(Request $request)
    {
        $register_service = new RegisterService();
        $customer = Customer::all();
        $hosting = Hosting::all();
        return view('admin.register_service.registerhosting', compact('customer', 'hosting', 'register_service'));
    }

    //vps
    public function registervps(Request $request)
    {
        $register_service = new RegisterService();
        $customer = Customer::all();
        $vps = VPS::all();
        return view('admin.register_service.registervps', compact('customer', 'vps', 'register_service'));
    }

    //email
    public function registeremail(Request $request)
    {
        $register_service = new EmailServices();
        $customer = Customer::all();
        $email = Email::all();
        return view('admin.register_service.registeremail', compact('customer', 'email', 'register_service'));
    }

    //ssl
    public function registerssl(Request $request)
    {
        $register_service = new SslServices();
        $customer = Customer::all();
        $ssl = Ssl::all();
        return view('admin.register_service.registerssl', compact('customer', 'ssl', 'register_service'));
    }

    //website
    public function registerwebsite(Request $request)
    {
        $register_service = new WebsiteServices();
        $customer = Customer::all();
        $website = Website::all();
        return view('admin.register_service.registerwebsite', compact('customer', 'website', 'register_service'));
    }

//
    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $logic_register_services = new RegisterServicesLogic();
                $data = RegisterService::join('customers as c', 'c.id', 'register_services.id_customer')
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
                    ->where('c.name', 'LIKE', "%{$query}%")
                    ->get();
            } else {
                $logic_register_services = new RegisterServicesLogic();
                $data = $logic_register_services->getListRegisterServices();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
            <tr>
            <td class="thstyleform">'.$row->id.'</td>
            <td class="thstyleform">'.$row->customer_name.'
            <p class="pstyleform1">'.$row->customer_email.'</p></td>
            <td class="thstyleform">'.$row->domain_name.''. $row->hosting_name . '
                            ' . $row->vps_name . '' . $row->email_name . '
                            ' . $row->ssl_name . '' . $row->website_name . '
             <p class="pstyleform1">'.$row->address_domain.'</p></td>
             <td class="thstyleform">'.$row->start_date.'
             <p class="pstyleform1">'.$row->end_date.'</p></td>
             <td class="thstyleform" @if('.$row->status.'==\'Quá hạn\')
             style="color: red; " @else @if('.$row->status.'==\'Đang hoạt động\')
             style="" @else style="color: #0040FF" @endif @endif>'.$row->status.'</td>
              ';
                }
            } else {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

            echo json_encode($data);
        }
    }



    public function entry(Request $request)
    {

        $register_service = RegisterService::find($request->id);
//            dd($register_service);

//        dd(date_modify ( '-$register_service->end_date' , strtotime ( $register_service->start_date ) ));

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
                    return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
                }
            }

            return redirect(route('admin.register_services.index'))->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect(route('admin.register_services.index'))->with('fail', 'Thất Bại');
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
            return redirect()->route('admin.register_services.index')->with('success', 'Thành Công');

        } catch (\Exception $e) {
            return redirect()->route('admin.register_services.index')->with('fail', 'Thất Bại');
        }
    }
}
