<?php

namespace App\Http\Controllers\Admin;

use App\Business\RegisterSoftLogic;
use App\Model\Customer;
use App\Model\RegisterService;
use App\Model\RegisterSoft;
use App\Model\Software;
use App\Model\Staff;
use App\Model\TypeSoftware;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterSoftController extends AdminController
{
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
    public function entry(Request $request){
        $register_soft= ($request->id) ? RegisterSoft::find($request->id) : new RegisterSoft();
        $software=Software::all();
        $customer=Customer::all();
        $staff=User::all();
        $type_software=TypeSoftware::all();
        return view('admin.register_soft.edit-add',compact('register_soft','customer','software','type_software','staff'));
    }
    public function store(Request $request){
        $register_soft=new RegisterSoft();
        if($request->id){
            $register_soft=RegisterSoft::find($request->id);
        }
        $validator=$this->validateInput(($request->all()),$register_soft->rules,$register_soft->message);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $request['start_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
        $request['end_date'] = date('Y-m-d H:i:s', strtotime($request->end_date));
        $register_soft->fill($request->all());
        try {

            $register_soft->save();
            return redirect(route('admin.register_softs.index'))->with('success', 'Success');
        } catch (\Exception $e) {
//            return redirect(route('admin.register_softs.index'))->with('fail', 'Fail'.$e); lấy lỗi sai ra dùng $e
            return redirect(route('admin.register_softs.index'))->with('fail', 'Fail');
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
