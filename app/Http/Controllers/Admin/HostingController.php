<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Domain;
use App\Models\Hosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use function GuzzleHttp\Promise\all;

class HostingController extends AdminController
{
    //
    public function index(){
        $this->authorize('hosting-access');

        $key = isset($request->key) ? $request->key : '';
        $hosting = new Hosting();
        $hostings = $hosting->getAll($key, 10);

        if (isset($request->amount)) {
            $hostings = $hosting->getAll($key, $request->amount);
        }

        return view('admin.hosting.index', compact('hostings'));
    }

    public function searchRow(Request $request)
    {
        $hosting = new Hosting();
        $hostings = $hosting->getAll($request->key, 10);
        if ($request->amount !== null) {
            $hostings = $hosting->getAll($request->key, $request->amount);
        }
        return view('admin.hosting.search-row',compact('hostings'));
    }

    public function show(Request $request){
        $hosting = Hosting::find($request->id);
        return view('admin.hosting.show', compact('hosting'));
    }
    public function entry(Request $request){
    $hosting = ($request->id) ? Hosting::find($request->id): new Hosting();
    return view('admin.hosting.edit-add', compact('hosting'));
}
    public function store(Request $request)
    {
        //tạo mới đối tượng khi không có request( request trả về null)
        $hosting = new Hosting();

//trong trường hợp chỉnh sửa (trả về id của đối tượng muốn chỉnh sửa)
        if ($request->id) {
            $hosting = Hosting::find($request->id);
            //duy nhat thi su dung ham duoi
//            $hosting->rules['name'] = 'required:hostings,name,'.$hosting->id;
        }
//        dd($domain->all());
        //đánh giá xét duyệt có đúng với bên model không nếu fails thì trở về màn hình nhập + hiện thông báo lỗi
        $validator = $this->validateInput($request->all(), $hosting->rules, $hosting->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $hosting->fill($request->all());

        try {
            $hosting->save();
            $hosting_id = $hosting->id;
            $hosting_update = Hosting::find($hosting_id);

            if ($hosting_update){
                $hosting_code = Helper::generateCodeBySpecialName($hosting->name).''.Helper::generateCodeById($hosting_id);
                try {
                    $hosting_update->update([
                        'code' => $hosting_code
                    ]);
//                    dd($hosting_update);
                }catch(\Exception $e){
                    return redirect(route('admin.hostings.index'))->with('fail', 'Thất Bại');
                }
            }

            return redirect(route('admin.hostings.index'))->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect(route('admin.hostings.index'))->with('fail', 'Thất Bại');
        }
    }
    public function destroy(Request $request){
        try{
            $hosting = Hosting::find($request->id);
            if($hosting == null){
                throw new \Exception();
            }
            $hosting->delete();
            return redirect()->route('admin.hostings.index')->with('success','Thành Công');

        }catch(\Exception $e){
            return redirect()->route('admin.hostings.index')->with('fail','Thất Bại');
        }
    }

}
