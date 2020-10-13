<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Customer;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use mysql_xdevapi\Exception;
use function GuzzleHttp\Promise\all;
class DomainController extends AdminController
{
    public function index(){
        $this->authorize('domain-access');

        $key = isset($request->key) ? $request->key : '';
        $domain = new Domain();
        $domains = $domain->getAll($key, 10);

        if (isset($request->amount)) {
            $domains = $domain->getAll($key, $request->amount);
        }

        return view('admin.domain.index',compact('domains'));
    }

    public function searchRow(Request $request)
    {
        $domain = new Domain();
        $domains = $domain->getAll($request->key, 10);
        if ($request->amount !== null) {
            $domains = $domain->getAll($request->key, $request->amount);
        }
        return view('admin.domain.search-row',compact('domains'));
    }

    public function show(Request $request){
        $domain = Domain::find($request->id);
        return view('admin.domain.show', compact('domain'));
    }
    // thực hiện xác nhận edit + create
    public function entry(Request $request){
        $domain = ($request->id) ? Domain::find($request->id): new Domain();
        return view('admin.domain.edit-add', compact('domain'));
        //compact truyền dữ liệu ra view với biến $domain
    }
    //nút save khi thực hiện edit + create
    public function store(Request $request)
    {
        //tạo mới đối tượng khi không có request( request trả về null)
        $domain = new Domain();

        //trong trường hợp chỉnh sửa (trả về id của đối tượng muốn chỉnh sửa)
        if ($request->id) {
            $domain = Domain::find($request->id);
            $domain->rules['name'] = 'required|unique:domains,name,'.$domain->id;
        }

        //đánh giá xét duyệt có đúng với bên model không nếu fails thì trở về màn hình nhập + hiện thông báo lỗi
        $validator = $this->validateInput($request->all(), $domain->rules, $domain->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $domain->fill($request->all());


        try {
            $domain->save();
            $domain_id = $domain->id;

            $domain_update = Domain::find($domain_id);

            if ($domain_update){
                $domain_code = Helper::vnToString($domain->name).''.Helper::generateCodeById($domain_id);

                try {
                    $domain_update->update([
                        'code' => $domain_code
                    ]);
                }catch (\Exception $e){
                    return redirect(route('admin.domains.index'))->with('fails', 'Fails');
                }
            }
            return redirect(route('admin.domains.index'))->with('success', 'Success');
        } catch (\Exception $e) {
            return redirect(route('admin.domains.index'))->with('fail', 'Fail');
        }
    }
    public function destroy(Request $request){
        try{
            $domain = Domain::find($request->id);
            if ($domain == null){
                throw new \Exception();
            }
            $domain->delete();
            return redirect()->route('admin.domains.index')->with('success','Xóa Thành Công');
        } catch (\Exception $e){
            return redirect()->route('admin.domains.index')->with('fail','Xóa Thất Bại');
        }
    }
}
