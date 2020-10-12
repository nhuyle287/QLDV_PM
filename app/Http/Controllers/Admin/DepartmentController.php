<?php


namespace App\Http\Controllers\Admin;

use App\Model\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class DepartmentController extends AdminController
{
    public function index(Request $request)
    {
        $departments = Department::paginate(Config::get('constants.pagination'));
        return view('admin.department.index', compact('departments'));
    }

    public function entry(Request $request){
        return view('admin.department.edit-add');
    }
    public function show(Request $request){
        $department = Department::find($request->id);
        return view('admin.department.show', compact('department'));
    }
}
