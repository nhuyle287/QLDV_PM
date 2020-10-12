<?php

namespace App\Http\Controllers\Admin;

use App\Model\TypeSoftware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;


class TypeSoftwareController extends AdminController
{
    //trang index
    public function index()
    {

        $type_software = TypeSoftware::paginate(Config::get('constants.pagination'));

        return view('admin.typesoftware.index', compact('type_software'));
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
        $type_software->name=$request->name;
        $type_software->description=strip_tags(html_entity_decode($request->description));
        try {

            $type_software->save();
            return redirect(route('admin.typesoftwares.index'))->with('success', 'Thành công');
        } catch (Exception $e) {
            return redirect(route('admin.typesoftwares.index'))->with('fail', 'Thất bại');
        }

    }
    public function destroy(Request $request)
    {

        try{
            $type_software=TypeSoftware::find($request->id);
            if ($type_software==null){
                throw new \Exception();
            }
            $type_software->delete();
            return redirect(route('admin.typesoftwares.index'))->with('success', 'Thành công');
        }catch (\Exception $e)
        {
            return redirect(route('admin.typesoftwares.index'))->with('fail', 'Thất bại');
        }
    }
}
