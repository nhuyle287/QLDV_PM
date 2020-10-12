<?php

namespace App\Http\Controllers\Admin;

use App\Model\TypeSoftware;
use App\Model\TypeStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use League\Flysystem\Exception;

class TypeStaffController extends Controller
{
    public function index(){
        $type_staff=TypeStaff::paginate(Config::get('constants.pagination'));
        return view('admin.typestaff.index',compact('type_staff'));
    }
    public function show(Request $request){
        $type_staff=TypeStaff::find($request->id);
        return view('admin.typestaff.show',compact('type_staff'));
    }
    public function entry(Request $request){
        $type_staff=($request->id)?TypeStaff::find($request->id):new TypeStaff();
        return view('admin.typestaff.edit-add',compact('type_staff'));
    }
    public function store(Request $request){
        $type_staff=new TypeStaff();
        if($request->id){
            $type_staff=TypeStaff::find($request->id);
        }
        $type_staff->fill($request->all());
        try{
            $type_staff->save();
            return redirect(route('admin.typestaffs.index'))->with('success', 'Thành công');
        }catch (\Exception $e){
            return redirect(route('admin.typestaffs.index'))->with('fail', 'Thất bại');
        }
    }
    public function destroy(Request $request){
        try{
            $type_staff=TypeStaff::find($request->id);
            if ($type_staff==null){
                throw new \Exception();
            }
            $type_staff->delete();
            return redirect(route('admin.typestaffs.index'))->with('success', 'Thành công');
        }catch (\Exception $e)
        {
            return redirect(route('admin.typestaffs.index'))->with('fail', 'Thất bại');
        }
    }
}
