<?php

namespace App\Http\Controllers\Admin;

use App\Business\RegisterSoftLogic;
use App\Helpers\Helper;
use App\Models\ConstantsModel;
use App\Models\Customer;
use App\Models\RegisterService;
use App\Models\RegisterSoft;
use App\Models\Software;
use App\Models\Staff;
use App\Models\TypeSoftware;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterSoftController extends AdminController
{
    const UNDERLINE = '_';
    const orders = 'DH';

    public function index(){
        $logic_register_soft=new RegisterSoftLogic();
        $register_softs=$logic_register_soft->getlistregistersoft();
        return view('admin.register_soft.index',compact('register_softs'));
    }
    public function show(Request $request){
        $logic_register_soft=new RegisterSoftLogic();
        $register_soft=$logic_register_soft->getdetailregistersoft($request->id);
        return view('admin.register_soft.show',compact('register_soft'));
    }
    //dk soft
    public function entry(Request $request){
        $register_soft= ($request->id) ? RegisterSoft::find($request->id) : new RegisterSoft();
        $software=Software::all();
        $customer=Customer::all();
        $staff=User::all();
        $type_software=TypeSoftware::all();
        return view('admin.register_soft.edit-add',compact('register_soft','customer','software','type_software','staff'));
    }
    public function store(Request $request){
//        dd($request->all());
        $register_soft=new RegisterSoft();
        if($request->id){
            $register_soft=RegisterSoft::find($request->id);
//            $register_soft->id=$request->id;
        }
        if($request->status==='Chính thức')
        {
            $register_soft->rules['start_date'] = 'required';
            $register_soft->message['start_date.required'] = 'Vui lòng nhập ngày bắt đầu cho phần mềm !';
        }
        $validator=$this->validateInput(($request->all()),$register_soft->rules,$register_soft->message);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }



        if($request->status==='Dùng thử')
        {
            $start_date=Carbon::now()->format('Y-m-d');
//            dùng thử 15 ngày
            $end_date =date('Y-m-d H:i:s', strtotime ( '+15 day' , strtotime ( $start_date )));
//            dd($end_date);
            $register_soft->start_date=$start_date;
            $register_soft->end_date=$end_date;
        }
        else
        {
            $start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
            $register_soft->start_date = $start_date;
            $date_using = $request->date_using;
            $register_soft->date_using = $date_using;
            $month_ = '+' . $date_using . ' month';
            $end_date = date('Y-m-d H:i:s', strtotime($month_, strtotime($start_date)));
            $register_soft->end_date = $end_date;
        }
//        $exist_date = date(strtotime($end_date)) - time();
//
//        if ($exist_date < 0) {
//            $years = floor(ABS($exist_date) / (365 * 60 * 60 * 24));
//            $months = floor((ABS($exist_date) - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
//            $days = floor((ABS($exist_date) - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
//            $register_soft->exist_date = "Quá $days-$months-$years";
//            $register_soft->status = 'Quá hạn';
//
//
//        } else {
//            $years = floor($exist_date / (365 * 60 * 60 * 24));
//            $months = floor(($exist_date - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
//            $days = floor(($exist_date - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
//            $date = floor($exist_date / (60 * 60 * 24));
//            if ($date < 30) {
//                $register_soft->status = "Còn $date";
//            } else {
//                $register_soft->status = 'Đang hoạt động';
//            }
//            $register_soft->exist_date = "Còn $days-$months-$years";
//        }
//        dd($end_date);
//        $request['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));
//        $register_soft->fill($request->all());
        $register_soft->transaction=0;
        $register_soft->id_staff=$request->id_staff;
        $register_soft->id_customer=$request->id_customer;
        $register_soft->notes=$request->notes;
        $register_soft->id_typesoftware=$request->id_typesoftware;
        $register_soft->id_software=$request->id_software;
        $register_soft->status=$request->status;
        $register_soft->address_domain=$request->address_domain;
        $register_soft->id_staff=Auth::id();
        try {

            $register_soft->save();
            $register_soft_id = $register_soft->id;
            $register_soft_update = RegisterSoft::find($register_soft_id);
            $code="ST";

            if ($register_soft_update) {
                $register_soft_code =self::orders . self::UNDERLINE  . $code . self::UNDERLINE. Helper::generateCodeById($register_soft_id);

                try {
                    $register_soft_update->update([
                        'code' => $register_soft_code,
                    ]);
//                    dd($register_soft_code);
                    return redirect(route('admin.order.software'))->with('success', 'Thành công');
                } catch (\Exception $e) {
                    return redirect(route('admin.order.software'))->with('fail', 'Thất Bại');
                }
            }

        } catch (\Exception $e) {
//            dd($e);
//            return redirect(route('admin.register_softs.index'))->with('fail', 'Fail'.$e); lấy lỗi sai ra dùng $e
            return redirect(route('admin.order.software'))->with('fail', 'Thất bại');
        }

    }
    // search

    public function extend(Request $request){
        $register_soft= ($request->id) ? RegisterSoft::find($request->id) : new RegisterSoft();
        $software=Software::all();
        $customer=Customer::all();
        $staff=User::all();
        $type_software=TypeSoftware::all();
        return view('admin.register_soft.extend',compact('register_soft','customer','software','type_software','staff'));
    }

    public function storeextend(Request $request){
//        dd($request->all());
        $register_soft=new RegisterSoft();
        if($request->id){
            $register_soft=RegisterSoft::find($request->id);
        }
//        $validator=$this->validateInput(($request->all()),$register_soft->rules,$register_soft->message);
//        if ($validator->fails()){
//            return redirect()->back()->withInput()->withErrors($validator);
//        }

//dd($register_soft->end_date);
        $end_date=$register_soft->end_date;
        $date_using = $request->date_using;
        $month_ = '+' . $date_using . ' month';
//        dd(date('Y-m-d H:i:s', strtotime('+26 month', strtotime($end_date))));
        $end_date_new = date('Y-m-d H:i:s', strtotime($month_, strtotime($end_date)));
        $transaction=1;
        $id_staff=Auth::id();
        try {

            $register_soft->where('id',$request->id)->update(['id_staff'=>$id_staff,'status'=>'Chính thức','transaction'=>$transaction,
                'end_date'=>$end_date_new,'date_using'=>$date_using]);
            return redirect(route('admin.order.software'))->with('success', 'Success');
        } catch (\Exception $e) {
//            return redirect(route('admin.register_softs.index'))->with('fail', 'Fail'.$e); lấy lỗi sai ra dùng $e
            return redirect(route('admin.order.software'))->with('fail', 'Fail');
        }

    }

    public function destroy(Request $request)
    {
        try {
            $register_soft = RegisterSoft::find($request->id);
            if ($register_soft == null) {
                throw new \Exception();
            }
            $register_soft->delete();
            return redirect()->route('admin.register_softs.index')->with('success', 'Thành Công');

        } catch (\Exception $e) {
            return redirect()->route('admin.register_softs.index')->with('fail', 'Thất Bại');
        }
    }
}
