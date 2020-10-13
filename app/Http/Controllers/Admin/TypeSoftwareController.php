<?php

namespace App\Http\Controllers\Admin;

use App\Models\TypeSoftware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;


class TypeSoftwareController extends AdminController
{
    //trang index
    public function index(Request $request)
    {
        $this->authorize('typesoftware-access');
        $key = isset($request->key) ? $request->key : '';
        $type_software = new TypeSoftware();
        $type_softwares = $type_software->get_all($key, 10);
        if ($request->amount !== null) {
            $type_softwares = $type_software->get_all($key, $request->amount);
        }
        return view('admin.typesoftware.index', compact('type_softwares'));
    }
    public function searchRow(Request $request)
    {
        $type_software = new TypeSoftware();
        $type_softwares = $type_software->get_all($request->key, 10);
        if ($request->amount !== null) {
            $type_softwares = $type_software->get_all($request->key, $request->amount);
        }
        return view('admin.typesoftware.search-row', compact('type_softwares'));
    }
    //hiển thị thông tin loại
    public function show(Request $request)
    {
        $type_software = TypeSoftware::find($request->id);
        return view('admin.typesoftware.show', compact('type_software'));
    }

    //đến trang edit or create
    public function entry(Request $request)
    {
        $type_software = ($request->id) ? TypeSoftware::find($request->id) : new TypeSoftware();
        return view('admin.typesoftware.edit-add', compact('type_software'));
    }

    public function store(Request $request)
    {
        $type_software = new TypeSoftware();
        if ($request->id) {
            $type_software = TypeSoftware::find($request->id);
            $type_software->rules['name'] = 'required|unique:typesoftwares,name,' . $type_software->id;
        }
        $validator = $this->validateInput($request->all(), $type_software->rules, $type_software->message);
        if ($validator->fails()) {

            return redirect()->back()->withInput()->withErrors($validator);
        }
//        $type_software->fill($request->all());
        $type_software->name = $request->name;
        $type_software->description = strip_tags(html_entity_decode($request->description));
        try {

            $type_software->save();
            return redirect(route('admin.typesoftwares.index'))->with('success', 'Thành công');
        } catch (Exception $e) {
            return redirect(route('admin.typesoftwares.index'))->with('fail', 'Thất bại');
        }

    }

    public function destroy(Request $request)
    {

        try {
            $type_software = TypeSoftware::find($request->id);
            if ($type_software == null) {
                throw new \Exception();
            }
            $type_software->delete();
            return redirect(route('admin.typesoftwares.index'))->with('success', 'Thành công');
        } catch (\Exception $e) {
            return redirect(route('admin.typesoftwares.index'))->with('fail', 'Thất bại');
        }
    }

    public function destroySelect(Request $request)
    {
        try {
            $allVals = explode(',', $request->allValsDelete[0]);
            if($allVals[0]!=="") {
                foreach ($allVals as $item) {
                    $type_software = TypeSoftware::find($item);
                    $type_software->delete();
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
}
