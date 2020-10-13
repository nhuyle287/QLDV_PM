<?php


namespace App\Http\Controllers\Admin;


use App\Models\Contract;
use App\Models\ContractModelDifferent;
use App\Models\ContractModelHome;
use App\Models\ContractModelProduct;
use App\Models\Customer;
use App\Models\Domain;
use App\Models\FunctionDifferent;
use App\Models\FunctionHome;
use App\Models\FunctionProduct;
use App\Models\Hosting;

use App\Models\Ssl;
use App\Models\VPS;
use App\Models\Website;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use Nexmo\Numbers\Number;
use function GuzzleHttp\Psr7\copy_to_string;

class ContractController extends AdminController
{
    public function index(Request $request)
    {
        $this->authorize('contract-access');

        $key = isset($request->key) ? $request->key : '';
        $contract = new Contract();
        $contracts = $contract->getAll($key, 10);

        if (isset($request->amount)) {
            $contracts = $contract->getAll($key, $request->amount);
        }
        return view('admin.contract.index', compact('contracts'));
        //compact di kem 1 bien, dung de lay du lieu load len index
    }

//Filter
    public function getFilter(Request $request)
    {
        $contract = new Contract();
        $contracts = $contract->getfilter($request->filter, 10);

        if (isset($request->amount)) {
            $contracts = $contract->getAll($request->filter, $request->amount);
        }
        return view('admin.contract.search-row', compact('contracts'));
    }

    public function searchRow(Request $request)
    {
//        dd($request->all());
        $contract = new Contract();
        $contracts = $contract->getsearch($request->key, 10,$request->filter);

        if (isset($request->amount)) {
            $contracts = $contract->getsearch($request->key, $request->amount,$request->filter);
        }

        return view('admin.contract.search-row', compact('contracts'));

    }

    public function destroy(Request $request)
    {
        try {
            $contract_different = ContractModelDifferent::where('id_contract', $request->id);
            $contract_home = ContractModelHome::where('id_contract', $request->id);
            $contract_product = ContractModelProduct::where('id_contract', $request->id);
            $contract = Contract::where('id', $request->id);

            if ($contract == null) {
                throw new \Exception();
            }
            if ($contract_product != null) {
                $contract_product->delete();
            }
            if ($contract_different != null) {
                $contract_different->delete();
            }
            if ($contract_home != null) {
                $contract_home->delete();
            }
            $contract->delete();
            return redirect()->route('admin.contract.index')->with('success', 'Xóa Thành Công');
        } catch (\Exception $e) {
            return redirect()->route('admin.contract.index')->with('fail', 'Xóa Thất Bại');
        }
    }

    public function destroySelect(Request $request)
    {
        try {
            $allVals = explode(',', $request->allValsDelete[0]);
            if($allVals[0]!=="") {
                foreach ($allVals as $item) {
                    $contract_different = ContractModelDifferent::where('id_contract', $item);
                    $contract_home = ContractModelHome::where('id_contract', $item);
                    $contract_product = ContractModelProduct::where('id_contract', $item);
                    $contract = Contract::where('id', $item);

                    if ($contract == null) {
                        throw new \Exception();
                    }
                    if ($contract_product != null) {
                        $contract_product->delete();
                    }
                    if ($contract_different != null) {
                        $contract_different->delete();
                    }
                    if ($contract_home != null) {
                        $contract_home->delete();
                    }
                    $contract->delete();
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

    public function show(Request $request)
    {
        $con = db::table('contracts')->where('id', '=', $request->id)->first();
        $cus = db::table('customers')
            ->join('contracts', 'contracts.id_customer', '=', 'customers.id')
            ->where('contracts.id', '=', $request->id)->first();
        $macode = explode('/', $con->code);
        $code = $macode[1];
//        dd($code);
        if ($code === 'HĐTKW') {

//  dd($cus);
            $web = db::table('websites')
                ->join('contracts', 'contracts.id_website', '=', 'websites.id')
                ->select('websites.name', 'websites.price')
                ->where('contracts.id', '=', $request->id)->first();
            $ssl = db::table('ssls')
                ->join('contracts', 'contracts.id_ssl', '=', 'ssls.id')
                ->select('ssls.name', 'ssls.price')
                ->where('contracts.id', '=', $request->id)->first();
            $domain = db::table('domains')
                ->join('contracts', 'contracts.id_domain', '=', 'domains.id')
                ->select('domains.name', 'domains.fee_register', 'domains.fee_remain')
                ->where('contracts.id', '=', $request->id)->first();
            $hosting = db::table('hostings')
                ->join('contracts', 'contracts.id_hosting', '=', 'hostings.id')
                ->select('hostings.name', 'hostings.capacity', 'hostings.price')
                ->where('contracts.id', '=', $request->id)->first();

            $contract_home = db::table('contract_model_home as con_ho')
                ->join('contracts', 'contracts.id', '=', 'con_ho.id_contract')
                ->join('model_home as ho', 'ho.id', '=', 'con_ho.id_home')
                ->where('con_ho.id_contract', '=', $request->id)->get();
//dd($contract_home);
            $contract_product = db::table('contract_model_product as con_pro')
                ->join('model_product as pro', 'pro.id', '=', 'con_pro.id_product')
                ->where('con_pro.id_contract', '=', $request->id)->get();

            $contract_different = db::table('contract_model_different as con_dif')
                ->join('model_different as dif', 'dif.id', '=', 'con_dif.id_different')
                ->where('con_dif.id_contract', '=', $request->id)->get();
//dd($web);

            $price_web = $web->price;


            $price_hosting = $hosting->price;

            $price_ssl = $ssl->price;

            $price_register = $domain->fee_register;
            $price_remain = $domain->fee_remain;

            $quantity_ssl = $con->quantity_ssl;
            $quantity_domain = $con->quantity_domain;
            $quantity_hosting = $con->quantity_hosting;
            $quantity_web = $con->quantity_website;


            $total_web = (int)$price_web * (int)$quantity_web;
            $total_ssl = (int)$price_ssl * (int)$quantity_ssl;
            $total_hosting = (int)$price_hosting * (int)$quantity_hosting;
            $total_domain = (int)$price_register * (int)$quantity_domain;
            $total = $total_hosting + $total_domain + $total_ssl + $total_web;

            $total_remain = $total_web + $total_ssl + $total_hosting + (int)$price_remain * (int)$quantity_domain;
// dd($total_web);

            return view('admin.contract.show', compact('cus', 'web', 'ssl', 'domain', 'hosting', 'con',
                'contract_home', 'contract_product', 'contract_different', 'total_web', 'total_ssl', 'total_domain', 'total_hosting',
                'total', 'total_remain'));
        } elseif ($code === 'HĐLTVPS') {
            $vpss = db::table('vpss')
                ->join('contracts', 'contracts.id_vps', '=', 'vpss.id')
                ->select('vpss.capacity', 'vpss.price')
                ->where('contracts.id', '=', $request->id)->first();
            return view('admin.contract.show_vps', compact('con', 'cus', 'vpss'));
        } elseif ($code === 'HĐCCTM') {
            $domain = db::table('domains')
                ->join('contracts', 'contracts.id_domain', '=', 'domains.id')
                ->select('domains.name', 'domains.fee_register', 'domains.fee_remain')
                ->where('contracts.id', '=', $request->id)->first();
            return view('admin.contract.show_domain', compact('con', 'cus', 'domain'));
        } else {
            $hosting = db::table('hostings')
                ->join('contracts', 'contracts.id_hosting', '=', 'hostings.id')
                ->select('hostings.name', 'hostings.price', 'hostings.capacity')
                ->where('contracts.id', '=', $request->id)->first();
            return view('admin.contract.show_hosting', compact('con', 'cus', 'hosting'));
        }
    }

    public function entry(Request $request)
    {
//
        $info = Customer::all();
        $website = Website::all();
        $hosting = Hosting::all();
        $domain = Domain::all();
        $ssl = Ssl::all();
        $vpss = VPS::all();
        if ($request->id) {
//            dd($request->id);
            $con = db::table('contracts')->where('id', '=', $request->id)->first();
            $code = $con->code;
            $code1 = explode('/', $code);
            $macode = $code1[1];
//            dd($macode);
            if ($macode === 'HĐTKW') {
                $contract = db::table('contracts as con')
                    ->join('customers as cu', 'cu.id', '=', 'con.id_customer')
                    ->join('websites as web', 'web.id', '=', 'con.id_website')
                    ->join('hostings as hos', 'hos.id', '=', 'con.id_hosting')
                    ->join('domains as do', 'do.id', '=', 'con.id_domain')
                    ->join('ssls', 'ssls.id', '=', 'con.id_ssl')
                    ->where('con.id', '=', $request->id)
                    ->select('cu.name', 'cu.phone_number', 'cu.email', 'cu.address', 'cu.nameStore', 'cu.position',
                        'cu.fax_number', 'cu.tax_number', 'cu.account_number', 'cu.open_at', 'con.id', 'con.code', 'con.id_customer',
                        'con.id_website', 'con.id_ssl', 'con.id_hosting', 'con.id_domain', 'con.price_1', 'con.price2', 'con.total_price',
                        'con.promotion', 'con.discount_price', 'con.languages', 'con.date_finish', 'con.date_infor', 'con.date_demo', 'date_code', 'con.date_test',
                        'con.quantity_ssl', 'con.quantity_domain', 'con.quantity_hosting', 'con.quantity_website', 'con.id_vps', 'con.quantity_vps', 'web.price as price_web',
                        'hos.price as price_hosting', 'hos.capacity', 'do.fee_register', 'do.fee_remain', 'ssls.price as price_ssl')
                    ->first();
            } elseif ($macode === 'HĐLTVPS') {
                $contract = db::table('contracts as con')
                    ->join('customers as cu', 'cu.id', '=', 'con.id_customer')
                    ->join('vpss', 'vpss.id', '=', 'con.id_vps')
                    ->where('con.id', '=', $request->id)
                    ->select('cu.name', 'cu.phone_number', 'cu.email', 'cu.address', 'cu.nameStore', 'cu.position',
                        'cu.fax_number', 'cu.tax_number', 'cu.account_number', 'cu.open_at', 'con.id', 'con.code', 'con.id_customer',
                        'con.id_website', 'con.id_ssl', 'con.id_hosting', 'con.id_domain', 'con.price_1', 'con.price2', 'con.total_price',
                        'con.promotion', 'con.discount_price', 'con.languages', 'con.date_finish', 'con.date_infor', 'con.date_demo', 'date_code', 'con.date_test',
                        'con.quantity_ssl', 'con.quantity_domain', 'con.quantity_hosting', 'con.quantity_website', 'con.id_vps', 'con.quantity_vps', 'vpss.name as name_vps', 'vpss.price', 'vpss.capacity')
                    ->first();

            } elseif ($macode === 'HĐCCTM') {
                $contract = db::table('contracts as con')
                    ->join('customers as cu', 'cu.id', '=', 'con.id_customer')
                    ->join('domains as do', 'do.id', '=', 'con.id_domain')
                    ->where('con.id', '=', $request->id)
                    ->select('cu.name', 'cu.phone_number', 'cu.email', 'cu.address', 'cu.nameStore', 'cu.position',
                        'cu.fax_number', 'cu.tax_number', 'cu.account_number', 'cu.open_at', 'con.id', 'con.code', 'con.id_customer',
                        'con.id_website', 'con.id_ssl', 'con.id_hosting', 'con.id_domain', 'con.price_1', 'con.price2', 'con.total_price',
                        'con.promotion', 'con.discount_price', 'con.languages', 'con.date_finish', 'con.date_infor', 'con.date_demo', 'date_code', 'con.date_test',
                        'con.quantity_ssl', 'con.quantity_domain', 'con.quantity_hosting', 'con.quantity_website', 'con.id_vps', 'con.quantity_vps',
                        'do.fee_register', 'do.fee_remain', 'do.name as name_domain')
                    ->first();
            } else {
                $contract = db::table('contracts as con')
                    ->join('customers as cu', 'cu.id', '=', 'con.id_customer')
                    ->join('hostings as hos', 'hos.id', '=', 'con.id_hosting')
                    ->where('con.id', '=', $request->id)
                    ->select('cu.name', 'cu.phone_number', 'cu.email', 'cu.address', 'cu.nameStore', 'cu.position',
                        'cu.fax_number', 'cu.tax_number', 'cu.account_number', 'cu.open_at', 'con.id', 'con.code', 'con.id_customer',
                        'con.id_website', 'con.id_ssl', 'con.id_hosting', 'con.id_domain', 'con.price_1', 'con.price2', 'con.total_price',
                        'con.promotion', 'con.discount_price', 'con.languages', 'con.date_finish', 'con.date_infor', 'con.date_demo', 'date_code', 'con.date_test',
                        'con.quantity_ssl', 'con.quantity_domain', 'con.quantity_hosting', 'con.quantity_website', 'con.id_vps', 'con.quantity_vps',
                        'hos.price as price_hosting', 'hos.capacity', 'hos.name as hos_name')
                    ->first();
            }

        } else {
            $contract = new Contract();
        }
//        dd((int)$contract->total_price);
        $vat = ((int)$contract->total_price - (int)$contract->discount_price) * 10 / 100;
//        dd($vat);
//        dd($code);
//        dd($contract);
//    $contract = ($request->id) ? Contract::find($request->id) : new Contract();
        return view('admin.contract.edit', compact('info', 'vat', 'vpss', 'website', 'hosting', 'domain', 'ssl', 'contract', 'macode'));
    }

    public function store(Request $request)
    {
//dd($request->all());
        $contract = new Contract();
        if ($request->id) {
            $contract = Contract::find($request->id);

        }
//        dd($contract->code);
        $validator = $this->validateInput($request->all(), $contract->rules, $contract->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->year;

        $code = $contract->code;
        $code1 = explode('/', $code);
        $macode = $code1[1];
        if ($macode === 'HĐTKW') {

            $code_contract = (string)$request->id . "-" . (string)$day . "" . (string)$month . "/HĐTKW/" . (string)$year;
            $contract->code = $code_contract;
            $contract->id_customer = (int)$request->id_customer;
            $contract->id_website = (int)$request->id_website;
            $contract->id_ssl = (int)$request->id_ssl;
            $contract->id_domain = (int)$request->id_domain;
            $contract->id_hosting = (int)$request->id_hosting;
            $contract->price_1 = (int)$request->price1;
            $contract->promotion = $request->promotion;
            $contract->discount_price = (int)$request->discount;
//        Tổng tiền
            $total_all = (int)$request->total_all;
            $total_price = $total_all - (int)$request->discount;
            $contract->total_price = $total_price;
//        tính price2
            $price2 = $total_price - (int)$request->price1;
            $contract->price2 = $price2;
            $contract->date_finish = (int)$request->date_finish;
            $contract->date_infor = $request->date_infor;
            $contract->date_demo = $request->date_demo;
            $contract->date_code = (int)$request->date_code;
            $contract->date_test = (int)$request->date_test;
            $contract->quantity_ssl = (int)$request->quantity_ssl;
            $contract->quantity_domain = (int)$request->quantity_domain;
            $contract->quantity_hosting = (int)$request->quantity_hosting;
            $contract->quantity_website = (int)$request->quantity;
            try {
                $contract->where('id', $request->id)->update(['code' => $code_contract, 'id_customer' => (int)$request->id_customer,
                    'id_website' => (int)$request->id_website, 'id_ssl' => (int)$request->id_ssl, 'id_domain' => (int)$request->id_domain,
                    'id_hosting' => (int)$request->id_hosting, 'price_1' => (int)$request->price1, 'promotion' => $request->promotion,
                    'discount_price' => (int)$request->discount, 'total_price' => $total_price, 'price2' => $price2, 'date_finish' => (int)$request->date_finish,
                    'date_demo' => $request->date_demo, 'date_infor' => $request->date_infor, 'date_code' => (int)$request->date_code,
                    'date_test' => (int)$request->date_test, 'quantity_ssl' => (int)$request->quantity_ssl, 'quantity_domain' => (int)$request->quantity_domain,
                    'quantity_hosting' => (int)$request->quantity_hosting, 'quantity_website' => (int)$request->quantity]);
                return redirect()->route('admin.contract.index')->with('success', 'Cập Nhật Thành Công');
            } catch (\Exception $e) {
                return redirect()->route('admin.contract.index')->with('success', 'Cập Nhật Thất Bại');
            }
        } elseif ($macode === 'HĐLTVPS') {
//            dd($request->all());
            $code_contract = (string)$request->id . "-" . (string)$day . "" . (string)$month . "/HĐLTVPS/" . (string)$year;
            $contract->code = $code_contract;
            $contract->id_customer = (int)$request->id_customer;
            $contract->id_vps = (int)$request->id_vps;
            $contract->total_price = (int)$request->total_all - (int)$request->discount;
            $contract->promotion = $request->promotion;
            $contract->discount_price = (int)$request->discount;
            $contract->quantity_vps = (int)$request->quantity_vps;

            try {
                $contract->where('id', $request->id)->update(['code' => $code_contract, 'id_customer' => (int)$request->id_customer,
                    'id_vps' => (int)$request->id_vps, 'promotion' => $request->promotion, 'discount_price' => (int)$request->discount,
                    'total_price' => (int)$request->total_all - (int)$request->discount, 'quantity_vps' => (int)$request->quantity_vps]);
                return redirect()->route('admin.contract.index')->with('success', 'Cập Nhật Thành Công');
            } catch (\Exception $e) {
                return redirect()->route('admin.contract.index')->with('success', 'Cập Nhật Thất Bại');
            }
        } elseif
        ($macode === 'HĐCCTM') {
//            dd($request->all());
            $code_contract = (string)$request->id . "-" . (string)$day . "" . (string)$month . "/HĐCCTM/" . (string)$year;
            $contract->code = $code_contract;
            $contract->id_customer = (int)$request->id_customer;
            $contract->id_domain = (int)$request->id_domain;
            $contract->total_price = (int)$request->total_domain - (int)$request->discount;
            $contract->promotion = $request->promotion;
            $contract->discount_price = (int)$request->discount;
            $contract->quantity_domain = (int)$request->quantity_domain;

            try {
                $contract->where('id', $request->id)->update(['code' => $code_contract, 'id_customer' => (int)$request->id_customer,
                    'id_domain' => (int)$request->id_domain, 'promotion' => $request->promotion, 'discount_price' => (int)$request->discount,
                    'total_price' => (int)$request->total_domain - (int)$request->discount, 'quantity_domain' => (int)$request->quantity_domain]);
                return redirect()->route('admin.contract.index')->with('success', 'Cập Nhật Thành Công');
            } catch (\Exception $e) {
                return redirect()->route('admin.contract.index')->with('success', 'Cập Nhật Thất Bại');
            }
        } else {
//            dd($request->all());
            $code_contract = (string)$request->id . "-" . (string)$day . "" . (string)$month . "/HĐLTHT/" . (string)$year;
            $contract->code = $code_contract;
            $contract->id_customer = (int)$request->id_customer;
            $contract->id_hosting = (int)$request->id_hosting;
            $contract->total_price = (int)$request->total_all - (int)$request->discount;
            $contract->promotion = $request->promotion;
            $contract->discount_price = (int)$request->discount;
            $contract->quantity_hosting = (int)$request->quantity_hosting;

            try {
                $contract->where('id', $request->id)->update(['code' => $code_contract, 'id_customer' => (int)$request->id_customer,
                    'id_hosting' => (int)$request->id_hosting, 'promotion' => $request->promotion, 'discount_price' => (int)$request->discount,
                    'total_price' => (int)$request->total_all - (int)$request->discount, 'quantity_hosting' => (int)$request->quantity_hosting]);
                return redirect()->route('admin.contract.index')->with('success', 'Cập Nhật Thành Công');
            } catch (\Exception $e) {
                return redirect()->route('admin.contract.index')->with('success', 'Cập Nhật Thất Bại');
            }
        }
    }

    public function software()
    {
        $info = Customer::all();
        $website = Website::all();
        $hosting = Hosting::all();
        $domain = Domain::all();
        $ssl = Ssl::all();
//        dd($info);
        return view('admin.contract.software', compact('info', 'website', 'hosting', 'domain', 'ssl'));

    }

    public function view(Request $request)
    {
//  dd($request->all());
//        $nameA=$request->nameA;
//   $contract=$request-


        $nameA = $request->nameStore;
        $name = $request->name;
        $position = $request->position;
        $address = $request->address;
        $telephone = $request->telephone;
        $fax = $request->fax_number;
        $tax_number = $request->tax_number;
        $account_number = $request->account_number;
        $open_at = $request->open_at;
        $email = $request->email;
        $price1 = $request->price1; // giá thanh toán lần 1
        $nameWS = $request->nameSW;
        $priceWS = $request->price;
        $quantityWS = $request->quantity;
        $totalWS = $request->total;
        $name_hosting = $request->name_hosting;
        $name_domain = $request->name_domain;
        $name_ssl = $request->name_ssl;
        $price_hosting = $request->price_hosting;
        $price_domain = $request->price_domain;
        $price_ssl = $request->price_ssl;
        $quantity_hosting = $request->quantity_hosting;
        $quantity_domain = $request->quantity_domain;
        $quantity_ssl = $request->quantity_ssl;
        $total_hosting = $request->total_hosting;
        $total_domain = $request->total_domain;
        $total_ssl = $request->total_ssl;
        $date_finish = $request->date_finish;
        $promotion = $request->promotion;
        $discount = $request->discount;
        $date_infor = $request->date_infor;
        $date_demo = $request->date_demo;
        $date_code = $request->date_code;
        $date_test = $request->date_test;
        $price_doamin_remain = $request->price_domain_remain;
        $stack = array();
        array_push($stack, $nameWS, $priceWS, $quantityWS, $totalWS);
        $a = array_chunk($stack, 4);
// tổng thành tiền
        $total = (int)$totalWS + (int)$total_hosting + (int)$total_domain + (int)$total_ssl;
//tổng tiền duy trì
        $total_domain_remain = (int)$price_doamin_remain * (int)$quantity_domain;
        $total_remain = (int)$total_hosting + (int)$total_domain_remain + (int)$total_ssl;
//thành tiền
        $total_price = $total - (float)($discount);
        $price2 = $total_price - $price1;
        $function_home = $request->list_function_homes;
        $functionhome = [];
        if (is_array($function_home) || is_object($function_home)) {
            foreach ($function_home as $key => $value) {
                $fun_home = explode(",", $value);
                $ten = $fun_home[0];
                array_push($functionhome, $ten);

            }
            $func_home = array_chunk($functionhome, 1);

        } else {
            $func_home = null;
        }
        $function_home = json_encode($function_home);
        $function_product = $request->list_function_products;
        $functionproduct = [];
        if (is_array($function_product) || is_object($function_product)) {
            foreach ($function_product as $key => $value) {
                $fun_product = explode(",", $value);
                $ten = $fun_product[0];
                array_push($functionproduct, $ten);

            }
            $func_product = array_chunk($functionproduct, 1);

        } else {
            $func_product = null;
        }
        $function_product = json_encode($function_product);
        $function_different = $request->list_function_differents;
        $functiondifferent = [];
        if (is_array($function_different) || is_object($function_different)) {
            foreach ($function_different as $key => $value) {
                $fun_different = explode(",", $value);
                $ten = $fun_different[0];
                array_push($functiondifferent, $ten);

            }
            $func_different = array_chunk($functionproduct, 1);

        } else {
            $func_different = null;
        }
        $function_different = json_encode($function_different);
        $func_language = $request->language;
        $vat10 = (float)$total * 10 / 100;
//dd($vat10)  ;

        $id_customer = $request->id_customer;
// dd($id_customer);
        $id_website = $request->id_website;
        $id_hosting = $request->id_hosting;
        $id_ssl = $request->id_ssl;
        $id_domain = $request->id_domain;
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->year;
        $date_create = Carbon::now()->toDateTimeString();


        return view('admin.contract.viewSW', compact('nameA', 'name', 'position', 'address', 'telephone', 'fax',
            'account_number', 'open_at', 'email', 'tax_number', 'a', 'total', 'vat10', 'price1', 'price2', 'func_home',
            'func_product', 'func_language', 'date_finish', 'promotion', 'total_price', 'date_infor'
            , 'date_demo', 'date_code', 'date_test', 'name_domain', 'name_ssl', 'price_hosting', 'discount',
            'price_domain', 'price_ssl', 'total_remain', 'name_hosting', 'quantity_hosting', 'quantityWS', 'totalWS',
            'quantity_domain', 'quantity_ssl', 'total_hosting', 'total_domain', 'total_ssl', 'total_domain_remain'
            , 'id_customer', 'id_domain', 'id_hosting', 'id_ssl', 'id_website', 'day', 'month', 'year', 'func_different', 'date_create',
            'function_home', 'function_product', 'function_different'));

    }

    public function print(Request $request)
    {
// dd($request->all());
        $contract = new Contract();
        $validator = $this->validateInput($request->all(), $contract->rules, $contract->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $request['date_create'] = date('Y-m-d', strtotime($request->date_create));
        $contract->id_customer = (int)$request->id_customer;
        $contract->id_website = (int)$request->id_website;
        $contract->id_ssl = (int)$request->id_ssl;
        $contract->id_domain = (int)$request->id_domain;
        $contract->price_1 = (int)$request->price1;
        $contract->price2 = (int)$request->price2;
        $contract->total_price = (int)$request->total_price;
        $contract->promotion = $request->promotion;
        $contract->discount_price = (int)$request->discount;
        $contract->languages = $request->language;
        $contract->date_finish = (int)$request->date_finish;
        $contract->date_infor = $request->date_infor;
        $contract->date_demo = $request->date_demo;
        $contract->date_code = (int)$request->date_code;
        $contract->date_test = (int)$request->date_test;
        $contract->quantity_ssl = (int)$request->quantitySSL;
        $contract->quantity_domain = (int)$request->quantityDomain;
        $contract->quantity_hosting = (int)$request->quantityHosting;
        $contract->quantity_website = (int)$request->quantityWS;
        $contract->date_create = $request->date_create;
        $contract->id_hosting = (int)$request->id_hosting;
        $contract->code = null;
        $contract->id_vps = null;
        $contract->quantity_vps = null;
// dd($contract);
        try {
            $contract->save();
            $day = Carbon::now()->format('d');
            $month = Carbon::now()->format('m');
            $year = Carbon::now()->year;
            $code_contract = (string)$contract->id . "-" . (string)$day . "" . (string)$month . "/HĐTKW/" . (string)$year;

            $contract->where('id', $contract->id)->update(['code' => $code_contract]);

            $function_home = $request->function_home;
            $functionhome = [];
//   dd($function_home);

            $function_home = str_replace('"', '', $function_home, $i);
            $function_home = str_replace('[', '', $function_home);
            $function_home = str_replace(']', '', $function_home);
//   dd($i);
            if (is_array($function_home) || is_object($function_home)) {
                foreach ($function_home as $key => $value) {
                    $fun_home = explode(",", $value);
//                     dd($i);

                    if (($i / 2) == 1) {
                        $ten = $fun_home[0];
                        array_push($functionhome, $ten);
                    } else {
                        for ($j = 0; $j < ($i / 2); $j++) {
                            $ten[$j] = $fun_home[$j];
//                           dd( $ten[$j] );
                            array_push($functionhome, $ten[$j]);
//                           dd($functionhome);
                        }
                    }
                }
                $func_home = array_chunk($functionhome, 1);
            }
//            dd($func_home);
            foreach ($func_home as $key => $value) {
                foreach ($value as $val) {
//      echo $val;
                    $func_home = new FunctionHome();
                    $func_home->function_home_name = $val;
//    dd($func_home->function_home_name);

                    $func_home->save();
//   dd($func_home->id);
                    $contract_home = new ContractModelHome();
                    $contract_home->id_home = $func_home->id;
                    $contract_home->id_contract = $contract->id;
                    $contract_home->save();
                }
            }
            $function_product = $request->function_product;
            $functionproducts = [];
            $function_product = str_replace('"', '', $function_product, $k);
            $function_product = str_replace('[', '', $function_product);
            $function_product = str_replace(']', '', $function_product);

            if (is_array($function_product) || is_object($function_product)) {
                foreach ($function_product as $key => $value) {
                    $fun_product = explode(",", $value);
// dd($i);

                    if (($k / 2) == 1) {
                        $tenproduct = $fun_product[0];
// dd( $ten[$j] );
                        array_push($functionproducts, $tenproduct);
                    } else {
                        for ($l = 0; $l < ($k / 2); $l++) {
                            $tenproduct[$l] = $fun_product[$l];
// dd( $ten[$j] );
                            array_push($functionproducts, $tenproduct[$l]);
                        }
                    }
// dd($functionproducts);

                }
                $func_product = array_chunk($functionproducts, 1);
            }

            foreach ($func_product as $key => $value) {
                foreach ($value as $val) {
                    $func_product = new FunctionProduct();
                    $func_product->function_product_name = $val;
//    dd($func_home->function_home_name);
                    $func_product->save();
//   dd($func_home->id);
                    $contract_product = new ContractModelProduct();
                    $contract_product->id_product = $func_product->id;
                    $contract_product->id_contract = $contract->id;
                    $contract_product->save();
                }
            }

            $function_different = $request->function_different;
            $functiondifferent = [];
            $function_different = str_replace('"', '', $function_different, $m);
            $function_different = str_replace('[', '', $function_different);
            $function_different = str_replace(']', '', $function_different);
//dd($function_different);
            if (is_array($function_different) || is_object($function_different)) {
                foreach ($function_different as $key => $value) {
                    $fun_different = explode(",", $value);
// dd($fun_different);
// dd($m);
                    if (($m / 2) == 1) {
                        $tendiff = $fun_different[0];
// dd( $ten[$j] );
                        array_push($functiondifferent, $tendiff);

                    } else {
                        for ($n = 0; $n < ($m / 2); $n++) {
                            $tendiff[$n] = $fun_different[$n];
// dd( $ten[$j] );
                            array_push($functiondifferent, $tendiff[$n]);
                        }
                    }
                }
                $func_different = array_chunk($functiondifferent, 1);
            }
            foreach ($func_different as $key => $value) {
                foreach ($value as $val) {
                    $func_different = new FunctionDifferent();
                    $func_different->function_different_name = $val;
                    $func_different->save();
                    $contract_different = new ContractModelDifferent();
                    $contract_different->id_contract = $contract->id;
                    $contract_different->id_different = $func_different->id;
                    $contract_different->save();
                }
            }
            $day = Carbon::now()->format('d');
            $month = Carbon::now()->format('m');
            $year = Carbon::now()->year;
            $cus = db::table('customers')->where('id', '=', $contract->id_customer)->first();
            $web = db::table('websites')->where('id', '=', $contract->id_website)->first();
            $ssl = db::table('ssls')->where('id', '=', $contract->id_ssl)->first();
            $domain = db::table('domains')->where('id', '=', $contract->id_domain)->first();
            $hosting = db::table('hostings')->where('id', '=', $contract->id_hosting)->first();
            $con = db::table('contracts')->where('id', '=', $contract->id)->first();
            $totalWS = $request->totalWS;
            $total_hosting = $request->total_hosting;
            $total_domain = $request->total_domain;
            $total_ssl = $request->total_ssL;
            $total_price = $request->total_price;
            $total = $total_hosting + $total_domain + $totalWS + $total_ssl;
            $price1 = $request->price1;
            $price2 = $request->price2;
            $total_remain = (int)$request->total_remain;
//  dd($total_remain);
// $name_hosting=$hosting->name + $hosting->capacity;
// dd($hosting);
//   dd($totalWS);
// $pdf = PDF::loadView('admin.contract.printContractWS');
            $contract_home = db::table('contract_model_home as con_ho')
                ->join('model_home as ho', 'ho.id', '=', 'con_ho.id_home')
                ->where('con_ho.id_contract', '=', $contract->id)->get();

            $contract_product = db::table('contract_model_product as con_pro')
                ->join('model_product as pro', 'pro.id', '=', 'con_pro.id_product')
                ->where('con_pro.id_contract', '=', $contract->id)->get();

            $contract_different = db::table('contract_model_different as con_dif')
                ->join('model_different as dif', 'dif.id', '=', 'con_dif.id_different')
                ->where('con_dif.id_contract', '=', $contract->id)->get();

            $language = $request->language;
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('admin.contract.printContractWS', compact('cus', 'web', 'ssl', 'domain', 'hosting',
                'con', 'day', 'month', 'year', 'totalWS', 'total_hosting', 'total_domain', 'total_ssl', 'total_price',
                'total', 'price1', 'price2', 'contract_home', 'contract_product', 'language', 'contract_different', 'total_remain'));
//        ->setPaper('a4','landscape');
            return $pdf->stream();
//   dd($contract->id);
// return redirect(route('admin.category-topic.index'))->with('success', 'Success');

        } catch (\Exception $e) {
            echo $e;
// return redirect(route('admin.category-topic.index'))->with('fail', 'Fail');

        }
    }

    public function print_website(Request $request)
    {
        $contract = new Contract();
        $con = db::table('contracts')->where('id', '=', $request->id)->first();
        $cus = db::table('customers')->where('id', '=', $con->id_customer)->first();
        $web = db::table('websites')->where('id', '=', $con->id_website)->first();
        $ssl = db::table('ssls')->where('id', '=', $con->id_ssl)->first();
        $domain = db::table('domains')->where('id', '=', $con->id_domain)->first();
        $hosting = db::table('hostings')->where('id', '=', $con->id_hosting)->first();
        $contract_home = db::table('contract_model_home as con_ho')
            ->join('contracts', 'contracts.id', '=', 'con_ho.id_contract')
            ->join('model_home as ho', 'ho.id', '=', 'con_ho.id_home')
            ->where('con_ho.id_contract', '=', $con->id)->get();
//dd($contract_home);
        $contract_product = db::table('contract_model_product as con_pro')
            ->join('model_product as pro', 'pro.id', '=', 'con_pro.id_product')
            ->where('con_pro.id_contract', '=', $con->id)->get();

        $contract_different = db::table('contract_model_different as con_dif')
            ->join('model_different as dif', 'dif.id', '=', 'con_dif.id_different')
            ->where('con_dif.id_contract', '=', $con->id)->get();
//dd($web);

        $price_web = $web->price;
        $price_hosting = $hosting->price;
        $price_ssl = $ssl->price;
        $price_register = $domain->fee_register;
        $price_remain = $domain->fee_remain;
        $quantity_ssl = $con->quantity_ssl;
        $quantity_domain = $con->quantity_domain;
        $quantity_hosting = $con->quantity_hosting;
        $quantity_web = $con->quantity_website;


        $totalWS = (int)$price_web * (int)$quantity_web;
        $total_ssl = (int)$price_ssl * (int)$quantity_ssl;
        $total_hosting = (int)$price_hosting * (int)$quantity_hosting;
        $total_domain = (int)$price_register * (int)$quantity_domain;
        $total = $total_hosting + $total_domain + $total_ssl + $totalWS;

        $total_remain = $totalWS + $total_ssl + $total_hosting + (int)$price_remain * (int)$quantity_domain;
// dd($total_web);
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->year;
        $date_create = Carbon::now()->format('Y/m/d');
        $code_contract = (string)$request->id . "-" . (string)$day . "" . (string)$month . "/HĐTKW/" . (string)$year;
        $contract->where('id', $request->id)->update(['date_create' => $date_create, 'code' => $code_contract]);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.contract.printContractWS', compact('cus', 'web', 'ssl', 'domain', 'hosting', 'con',
            'contract_home', 'contract_product', 'contract_different', 'totalWS', 'total_ssl', 'total_domain', 'total_hosting',
            'total', 'total_remain', 'day', 'month', 'year'));
//        ->setPaper('a4','landscape');
        return $pdf->stream();
    }

    public function VPS()
    {
        $info = Customer::all();
        $vpss = VPS::all();
//        $hosting = Hosting::all();
//        $domain = Domain::all();
//        $ssl = Ssl::all();
//        dd($info);
        return view('admin.contract.vps', compact('info', 'vpss'));

    }

    public function reviewVPS(Request $request)
    {
//        dd($request->all());
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->year;

        $nameStore = $request->nameStore;
        $id_customer = $request->id_customer;
        $name = $request->name;
        $position = $request->position;
        $address = $request->address;
        $phone_number = $request->phone_number;
        $fax_number = $request->fax_number;
        $account_number = $request->account_number;
        $open_at = $request->open_at;
        $tax_number = $request->tax_number;
        $email = $request->email;
        $id_vps = $request->id_vps;
        $namevps = $request->namevps;
        $price = $request->price;
        $quantity = $request->quantity;
        $total = (int)$request->total;
        $promotion = $request->promotion;
        $discount = (int)$request->discount;
        $vat10 = $request->vat10;
//        dd($promotion);

        return view('admin.contract.viewVPS', compact('day', 'month', 'year', 'nameStore', 'name',
            'position', 'address', 'phone_number', 'fax_number', 'tax_number', 'account_number', 'open_at', 'email', 'id_vps',
            'namevps', 'price', 'quantity', 'total', 'promotion', 'discount', 'id_customer', 'vat10'));
    }

    public function printVPS(Request $request)
    {
        $contract = new Contract();
        $validator = $this->validateInput($request->all(), $contract->rules, $contract->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $contract->id_customer = (int)$request->id_customer;
        $contract->id_vps = (int)$request->id_vps;
        $contract->total_price = (int)$request->total_price;
        $contract->promotion = $request->promotion;
        $contract->discount_price = (int)$request->discount;
        $contract->quantity_vps = (int)$request->quantityVPS;
        $contract->date_create = Carbon::now()->toDateString('Y-m-d');
        $contract->languages = null;
        $contract->date_finish = null;
        $contract->date_infor = null;
        $contract->date_demo = null;
        $contract->date_code = null;
        $contract->date_test = null;
        $contract->quantity_ssl = null;
        $contract->quantity_domain = null;
        $contract->quantity_hosting = null;
        $contract->quantity_website = null;
        $contract->id_hosting = null;
        $contract->id_website = null;
        $contract->id_ssl = null;
        $contract->id_domain = null;
        $contract->price_1 = null;
        $contract->price2 = null;
        $contract->code = null;
        try {
            $contract->save();
            $day = Carbon::now()->format('d');
            $month = Carbon::now()->format('m');
            $year = Carbon::now()->year;
            $code_contract = (string)$contract->id . "-" . (string)$day . "" . (string)$month . "/HĐLTVPS/" . (string)$year;

            $contract->where('id', $contract->id)->update(['code' => $code_contract]);

            $cus = db::table('customers')->where('id', '=', $contract->id_customer)->first();
            $vps = db::table('vpss')->where('id', '=', $contract->id_vps)->first();
            $con = db::table('contracts')->where('id', '=', $contract->id)->first();

//  dd($total_remain);
// $name_hosting=$hosting->name + $hosting->capacity;
// dd($hosting);
//   dd($totalWS);
// $pdf = PDF::loadView('admin.contract.printContractWS');

            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('admin.contract.printVPS', compact('cus', 'vps', 'con', 'day', 'month', 'year'));
//        ->setPaper('a4','landscape');
            return $pdf->stream();
//   dd($contract->id);
// return redirect(route('admin.category-topic.index'))->with('success', 'Success');

        } catch (\Exception $e) {
            echo $e;
// return redirect(route('admin.category-topic.index'))->with('fail', 'Fail');

        }


    }

    public function print_vps(Request $request)
    {
        $contract = new Contract();
        $con = db::table('contracts')->where('id', '=', $request->id)->first();
        $cus = db::table('customers')->where('id', '=', $con->id_customer)->first();
        $vps = db::table('vpss')->where('id', '=', $con->id_vps)->first();
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->year;
        $date_create = Carbon::now()->format('Y/m/d');
        $code_contract = (string)$request->id . "-" . (string)$day . "" . (string)$month . "/HĐLTVPS/" . (string)$year;
        $contract->where('id', $request->id)->update(['date_create' => $date_create, 'code' => $code_contract]);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.contract.printVPS', compact('cus', 'vps', 'con', 'day', 'month', 'year'));
//        ->setPaper('a4','landscape');
        return $pdf->stream();
    }

    public function domain()
    {
        $info = Customer::all();
        $domain = Domain::all();
        return view('admin.contract.domain', compact('info', 'domain'));
    }

    public function reviewDomain(Request $request)
    {
//        dd($request->all());
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->year;

        $nameStore = $request->nameStore;
        $id_customer = $request->id_customer;
        $name = $request->name;
        $position = $request->position;
        $address = $request->address;
        $phone_number = $request->phone_number;
        $fax_number = $request->fax_number;
        $account_number = $request->account_number;
        $open_at = $request->open_at;
        $tax_number = $request->tax_number;
        $email = $request->email;
        $id_domain = $request->id_domain;
        $name_domain = $request->name_domain;
        $price_domain = (int)$request->price_domain;
        $quantity_domain = (int)$request->quantity_domain;
        $total = (int)$request->total_domain;
        $promotion = $request->promotion;
        $discount = (int)$request->discount;

//        dd($promotion);

        return view('admin.contract.viewdomain', compact('day', 'month', 'year', 'nameStore', 'name',
            'position', 'address', 'phone_number', 'fax_number', 'tax_number', 'account_number', 'open_at', 'email', 'id_domain',
            'name_domain', 'price_domain', 'quantity_domain', 'total', 'promotion', 'discount', 'id_customer'));
    }

    public function printDomain(Request $request)
    {
        $contract = new Contract();
        $validator = $this->validateInput($request->all(), $contract->rules, $contract->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $contract->id_customer = (int)$request->id_customer;
        $contract->id_vps = null;
        $contract->total_price = (int)$request->total_price;
        $contract->promotion = $request->promotion;
        $contract->discount_price = (int)$request->discount;
        $contract->quantity_vps = null;
        $contract->date_create = Carbon::now()->toDateString('Y-m-d');
        $contract->languages = null;
        $contract->date_finish = null;
        $contract->date_infor = null;
        $contract->date_demo = null;
        $contract->date_code = null;
        $contract->date_test = null;
        $contract->quantity_ssl = null;
        $contract->quantity_domain = (int)$request->quantity_domain;;
        $contract->quantity_hosting = null;
        $contract->quantity_website = null;
        $contract->id_hosting = null;
        $contract->id_website = null;
        $contract->id_ssl = null;
        $contract->id_domain = (int)$request->id_domain;
        $contract->price_1 = null;
        $contract->price2 = null;
        $contract->code = null;
        try {
            $contract->save();
            $day = Carbon::now()->format('d');
            $month = Carbon::now()->format('m');
            $year = Carbon::now()->year;
            $code_contract = (string)$contract->id . "-" . (string)$day . "" . (string)$month . "/HĐCCTM/" . (string)$year;

            $contract->where('id', $contract->id)->update(['code' => $code_contract]);

            $cus = db::table('customers')->where('id', '=', $contract->id_customer)->first();
            $domain = db::table('domains')->where('id', '=', $contract->id_domain)->first();
            $con = db::table('contracts')->where('id', '=', $contract->id)->first();

//  dd($total_remain);
// $name_hosting=$hosting->name + $hosting->capacity;
// dd($hosting);
//   dd($totalWS);
// $pdf = PDF::loadView('admin.contract.printContractWS');

            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('admin.contract.printDomain', compact('cus', 'domain', 'con', 'day', 'month', 'year'));
//        ->setPaper('a4','landscape');
            return $pdf->stream();
//   dd($contract->id);
// return redirect(route('admin.category-topic.index'))->with('success', 'Success');

        } catch (\Exception $e) {
            echo $e;
// return redirect(route('admin.category-topic.index'))->with('fail', 'Fail');

        }
    }

    public function print_domain(Request $request)
    {
        $contract = new Contract();
        $con = db::table('contracts')->where('id', '=', $request->id)->first();
        $cus = db::table('customers')->where('id', '=', $con->id_customer)->first();
        $domain = db::table('domains')->where('id', '=', $con->id_domain)->first();
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->year;
        $date_create = Carbon::now()->format('Y/m/d');
        $code_contract = (string)$request->id . "-" . (string)$day . "" . (string)$month . "/HĐCCTM/" . (string)$year;
        $contract->where('id', $request->id)->update(['date_create' => $date_create, 'code' => $code_contract]);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.contract.printDomain', compact('cus', 'domain', 'con', 'day', 'month', 'year'));
//        ->setPaper('a4','landscape');
        return $pdf->stream();
    }

    public function hosting()
    {
        $info = Customer::all();
        $hosting = Hosting::all();
        return view('admin.contract.hosting', compact('info', 'hosting'));
    }

    public function reviewHosting(Request $request)
    {
//        dd($request->all());
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->year;

        $nameStore = $request->nameStore;
        $id_customer = $request->id_customer;
        $name = $request->name;
        $position = $request->position;
        $address = $request->address;
        $phone_number = $request->phone_number;
        $fax_number = $request->fax_number;
        $account_number = $request->account_number;
        $open_at = $request->open_at;
        $tax_number = $request->tax_number;
        $email = $request->email;
        $id_hosting = $request->id_hosting;
        $capacity = $request->namehosting;
        $price_hosting = (int)$request->price;
        $quantity_hosting = (int)$request->quantity;
        $total = (int)$request->total;
        $vat10 = (int)$request->vat10;
        $total_all = (int)$request->total_all;
        $promotion = $request->promotion;
        $discount = (int)$request->discount;
        return view('admin.contract.viewhosting', compact('day', 'month', 'year', 'nameStore', 'name',
            'position', 'address', 'phone_number', 'fax_number', 'tax_number', 'account_number', 'open_at', 'email', 'id_hosting',
            'capacity', 'price_hosting', 'quantity_hosting', 'total', 'vat10', 'total_all', 'promotion', 'discount', 'id_customer'));
    }

    public function printHosting(Request $request)
    {
        $contract = new Contract();
        $validator = $this->validateInput($request->all(), $contract->rules, $contract->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $contract->id_customer = (int)$request->id_customer;
        $contract->id_vps = null;
        $contract->total_price = (int)$request->total_price;
        $contract->promotion = $request->promotion;
        $contract->discount_price = (int)$request->discount;
        $contract->quantity_vps = null;
        $contract->date_create = Carbon::now()->toDateString('Y-m-d');
        $contract->languages = null;
        $contract->date_finish = null;
        $contract->date_infor = null;
        $contract->date_demo = null;
        $contract->date_code = null;
        $contract->date_test = null;
        $contract->quantity_ssl = null;
        $contract->quantity_domain = null;
        $contract->quantity_hosting = (int)$request->quantity_hosting;
        $contract->quantity_website = null;
        $contract->id_hosting = (int)$request->id_hosting;
        $contract->id_website = null;
        $contract->id_ssl = null;
        $contract->id_domain = null;
        $contract->price_1 = null;
        $contract->price2 = null;
        $contract->code = null;
        try {
            $contract->save();
            $day = Carbon::now()->format('d');
            $month = Carbon::now()->format('m');
            $year = Carbon::now()->year;
            $code_contract = (string)$contract->id . "-" . (string)$day . "" . (string)$month . "/HĐLTHT/" . (string)$year;

            $contract->where('id', $contract->id)->update(['code' => $code_contract]);

            $cus = db::table('customers')->where('id', '=', $contract->id_customer)->first();
            $hosting = db::table('hostings')->where('id', '=', $contract->id_hosting)->first();
            $con = db::table('contracts')->where('id', '=', $contract->id)->first();

//  dd($total_remain);
// $name_hosting=$hosting->name + $hosting->capacity;
// dd($hosting);
//   dd($totalWS);
// $pdf = PDF::loadView('admin.contract.printContractWS');
//return view('admin.contract.printHosting',compact('cus', 'hosting', 'con', 'day', 'month', 'year'));
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('admin.contract.printHosting', compact('cus', 'hosting', 'con', 'day', 'month', 'year'));
//        ->setPaper('a4','landscape');
            return $pdf->stream();
//   dd($contract->id);
// return redirect(route('admin.category-topic.index'))->with('success', 'Success');

        } catch (\Exception $e) {
            echo $e;
// return redirect(route('admin.category-topic.index'))->with('fail', 'Fail');

        }
    }

    public function print_hosting(Request $request)
    {
        $contract = new Contract();
        $con = db::table('contracts')->where('id', '=', $request->id)->first();
        $cus = db::table('customers')->where('id', '=', $con->id_customer)->first();
        $hosting = db::table('hostings')->where('id', '=', $con->id_hosting)->first();
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->year;
        $date_create = Carbon::now()->format('Y/m/d');
        $code_contract = (string)$request->id . "-" . (string)$day . "" . (string)$month . "/HĐLTHT/" . (string)$year;
        $contract->where('id', $request->id)->update(['date_create' => $date_create, 'code' => $code_contract]);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.contract.printHosting', compact('cus', 'hosting', 'con', 'day', 'month', 'year'));
//        ->setPaper('a4','landscape');
        return $pdf->stream();
    }
}
