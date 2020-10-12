<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Model\Staff;
use App\Model\TypeStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class StaffController extends AdminController
{
    //
    public function index(){
        $staffs = Staff::paginate(Config::get('constants.pagination'));
        return view('admin.staff.index', compact('staffs'));
    }
    public function show(Request $request){
        $staff = Staff::find($request->id);
        return view('admin.staff.show', compact('staff'));
    }
    public function entry(Request $request){
        $staff =($request->id) ? Staff::find($request->id):new Staff();
        $type=TypeStaff::all();
        return view('admin.staff.edit-add', compact('staff','type'));
    }
    public function store(Request $request){
            $staff=new Staff();
            if ($request->id){
                $staff = Staff::find($request->id);
            }
            $validator=$this->validateInput(($request->all()),$staff->rules,$staff->message);
            if ($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator);
            }
        $request['birthday'] = date('Y-m-d H:i:s', strtotime($request->birthday));
        $staff->fill($request->all());
        try{
            $staff->save();
            return redirect(route('admin.staffs.index'))->with('success','Thành Công');
        }catch (\Exception $e){
            return redirect(route('admin.staffs.index'))->with('fail','Thất Bại');
        }
    }
    public function destroy(Request $request){
        try{
            $staff = Staff::find($request->id);
            if ($staff == null){
                throw new \Exception();
            }
            $staff->delete();
            return redirect()->route('admin.staffs.index')->with('success', 'Thành Công');
        }catch (\Exception $e){
            return redirect()->route('admin.staffs.index')->with('fails', 'Thất Bại');
        }
    }

}
