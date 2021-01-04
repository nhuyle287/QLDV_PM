<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Mail\mails;
use App\Mail\OrderMails;
use App\Models\Email;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmailController extends AdminController
{
    //
    public function index()
    {
        $this->authorize('email-access');

        $key = isset($request->key) ? $request->key : '';
        $email = new Email();
        $emails = $email->getAll($key, 10);

        if (isset($request->amount)) {
            $emails = $email->getAll($key, $request->amount);
        }
        return view('admin.email.index', compact('emails'));
    }

    public function searchRow(Request $request)
    {
        $email = new Email();
        $emails = $email->getAll($request->key, 10);
        if ($request->amount !== null) {
            $emails = $email->getAll($request->key, $request->amount);
        }
        return view('admin.email.search-row', compact('emails'));
    }

    public function show(Request $request)
    {
        $email = Email::find($request->id);
        return view('admin.email.show', compact('email'));
    }

    public function entry(Request $request)
    {
//        dd($request->all());
        $email = ($request->id) ? Email::find($request->id) : new Email();
        return view('admin.email.edit-add', compact('email'));
    }

    public function store(Request $request)
    {
        //tạo mới đối tượng khi không có request( request trả về null)
        $email = new Email();

//trong trường hợp chỉnh sửa (trả về id của đối tượng muốn chỉnh sửa)
        if ($request->id) {
            $email = Email::find($request->id);
            //duy nhat thi su dung ham duoi
//            $hosting->rules['name'] = 'required:hostings,name,'.$hosting->id;
        }
//        dd($domain->all());
        //đánh giá xét duyệt có đúng với bên model không nếu fails thì trở về màn hình nhập + hiện thông báo lỗi
        $validator = $this->validateInput($request->all(), $email->rules, $email->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $email->fill($request->all());
//        dd($request->all());
        try {
            $email->save();
            $email_id = $email->id;
            $email_update = Email::find($email_id);
            if ($email_update) {
                $email_code = Helper::generateCodeBySpecialName($email->name) . '' . Helper::generateCodeById($email->id);
                try {
                    $email_update->update([
                        'code' => $email_code
                    ]);
                } catch (\Exception $e) {
                    return redirect(route('admin.emails.index'))->with('fail', 'Thất Bại');
                }
            }

            return redirect(route('admin.emails.index'))->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect(route('admin.emails.index'))->with('fail', 'Thất Bại');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $email = Email::find($request->id);
            if ($email == null) {
                throw new \Exception();
            }
            $email->delete();
            return redirect()->route('admin.emails.index')->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect()->route('admin.emails.index')->with('fails', 'Thất bại');
        }
    }

//    public function order_mail(Request $request)
//    {
//
//        $email = db::table('register_services')->join('customers as c', 'c.id', '=','register_services.id_customer')
//            ->Join('domains as d', 'd.id','=', 'register_services.id_domain')
//            ->Join('hostings as h', 'h.id', '=','register_services.id_hosting')
//            ->Join('vpss as v', 'v.id', '=','register_services.id_vps')
//            ->Join('emails as e', 'e.id', '=','register_services.id_email')
//            ->Join('ssls as s', 's.id', '=','register_services.id_ssl')
//            ->Join('websites as w', 'w.id', '=','register_services.id_website')
//            ->select('register_services.*', 'c.name as customer_name', 'c.email as customer_email',
//                'c.phone_number as phone',
//                'w.name as website_name', 'w.type_website as website_type',
//                's.name as ssl_name',
//                'e.name as email_name',
//                'v.name as vps_name',
//                'h.name as hosting_name',
//                'd.name as domain_name',
//                'h.price as hosting_price',
//                'v.price as vps_price',
//                'e.price as email_price',
//                's.price as ssl_price',
//                'w.price as website_price',
//                'd.fee_register as domain_fee_register',
//                'd.fee_remain as domain_fee_remain',
//                'd.fee_tranformation as domain_fee_tranformation')
//            ->where('register_services.transaction', '!=', "0")
//            ->whereNull('register_services.deleted_at')
//            ->whereNull('c.deleted_at')
//            ->whereNull('d.deleted_at')
//            ->whereNull('h.deleted_at')
//            ->whereNull('v.deleted_at')
//            ->whereNull('e.deleted_at')
//            ->whereNull('s.deleted_at')
//            ->whereNull('w.deleted_at')
//            ->get();
//
//        foreach ($email as $e)
//        {
//            $name=$e->customer_name;
//            Mail::to($e->customer_email)->send(new OrderMails());
//        }
//        return redirect()->route('admin.index')->with('success', 'Thành Công');
//    }

}
