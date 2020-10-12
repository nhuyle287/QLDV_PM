<?php


namespace App\Http\Controllers\Admin;


use App\Model\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class UnitController extends AdminController
{
    public function index(Request $request)
    {
        $units = Unit::paginate(Config::get('constants.pagination'));
        return view('admin.unit.index', compact('units'));
    }

    public function entry(Request $request){
        return view('admin.unit.edit-add');
    }
    public function show(Request $request){
        $unit = Unit::find($request->id);
        return view('admin.unit.show', compact('unit'));
    }
}
