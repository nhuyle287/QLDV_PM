<?php


namespace App\Http\Controllers\Admin;


use App\Model\Purpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PurposeController extends AdminController
{
    public function index(Request $request)
    {
        $purposes = Purpose::paginate(Config::get('constants.pagination'));
        return view('admin.purpose.index', compact('purposes'));
    }

    public function entry(Request $request){
        return view('admin.purpose.edit-add');
    }
    public function show(Request $request){
        $purpose = Purpose::find($request->id);
        return view('admin.purpose.show', compact('purpose'));
    }
}
