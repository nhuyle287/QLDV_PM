<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Hosting;
use App\Models\Software;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class SoftwareController extends AdminController
{
    //
    public function index(){
        $softwares = Software::paginate(Config::get('constants.pagination'));
        return view('admin.software.index',compact('softwares'));
    }
    public function show(Request $request){
        $software = Software::find($request->id);
        return view('admin.software.show', compact('software'));
    }
    public function entry(Request $request){
        $software = ($request->id) ? Software::find($request->id) : new Software();
        return view('admin.software.edit-add', compact('software'));
    }
    public function store(Request $request){
        $software = new Software();

        if ($request->id){
            $software = Software::find($request->id);
        }

        $validator = $this->validateInput($request->all(), $software->rules, $software->message);

        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $software->fill($request->all());
//        dd($software);
        try {
            $software->save();
            return redirect(route('admin.softwares.index'))->with('success', 'Thành Công');
        } catch (\Exception $e){
            return redirect(route('admin.softwares.index'))->with('fail', 'Thất bại');
        }
    }
    public function destroy(Request $request){
        try{
            $software = Software::find($request->id);
            if($software == null){
                throw new \Exception();
            }
            $software->delete();
            return redirect()->route('admin.softwares.index')->with('success','Thành Công');

        }catch(\Exception $e){
            return redirect()->route('admin.softwares.index')->with('fail','Thất Bại');
        }
    }
}
