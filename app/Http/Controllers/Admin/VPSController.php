<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Hosting;
use App\Models\VPS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class VPSController extends AdminController
{
    //
    public function index(){
        $this->authorize('vps-access');

        $key = isset($request->key) ? $request->key : '';
        $vps = new VPS();
        $vpss = $vps->getAll($key, 10);

        if (isset($request->amount)) {
            $vpss = $vps->getAll($key, $request->amount);
        }
        return view('admin.vps.index',compact('vpss'));
    }

    public function searchRow(Request $request)
    {
        $vps = new VPS();
        $vpss = $vps->getAll($request->key, 10);
        if ($request->amount !== null) {
            $vpss = $vps->getAll($request->key, $request->amount);
        }
        return view('admin.vps.search-row',compact('vpss'));
    }

    public function show(Request $request){
        $vps = VPS::find($request->id);
        return view('admin.vps.show',compact('vps'));
    }
    public function entry(Request $request){
        $vps = ($request->id) ? VPS::find($request->id): new VPS();
        return view('admin.vps.edit-add',compact('vps'));
    }
    public function store(Request $request)
    {
        //tạo mới đối tượng khi không có request( request trả về null)
        $vps = new VPS();

//trong trường hợp chỉnh sửa (trả về id của đối tượng muốn chỉnh sửa)
        if ($request->id) {
            $vps = VPS::find($request->id);

        }
//        dd($request->all());
        $validator = $this->validateInput($request->all(), $vps->rules, $vps->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $vps->fill($request->all());

        try {
            $vps->save();
            $vps_id = $vps->id;
            $vps_update = VPS::find($vps_id);
            if ($vps_update){
                $vps_code=Helper::generateCodeBySpecialName($vps->name).''.Helper::generateCodeById($vps->id);
                try {
                    $vps_update->update([
                        'code' => $vps_code
                    ]);
//                    dd($vps_update);
                }catch (\Exception $e){
                    return redirect(route('admin.vpss.index'))->with('fail', 'Thất Bại');
                }
            }

            return redirect(route('admin.vpss.index'))->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect(route('admin.vpss.index'))->with('fail', 'Thất Bại');
        }
    }
    public function destroy(Request $request){
        try {
            $vps = VPS::find($request->id);
            if ($vps == null){
                throw new \Exception();
            }
            $vps->delete();
            return redirect()->route('admin.vpss.index')->with('success','Xóa thành công');
        } catch(\Exception $e){
            return redirect()->route('admin.vpss.index')->with('fails','Xóa Thất Bại');
        }
    }
}
