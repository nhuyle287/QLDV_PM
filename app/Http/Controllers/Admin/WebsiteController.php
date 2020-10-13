<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class WebsiteController extends AdminController
{
    //
    public function index(){
        $this->authorize('domain-access');

        $key = isset($request->key) ? $request->key : '';
        $website = new Website();
        $websites = $website->getAll($key, 10);

        if (isset($request->amount)) {
            $websites = $website->getAll($key, $request->amount);
        }
        return view('admin.website.index',compact('websites'));
    }

    public function searchRow(Request $request)
    {
        $website = new Website();
        $websites = $website->getAll($request->key, 10);
        if ($request->amount !== null) {
            $websites = $website->getAll($request->key, $request->amount);
        }
        return view('admin.website.search-row',compact('websites'));
    }

    public function show(Request $request){
        $website = Website::find($request->id);
        return view('admin.website.show', compact('website'));
    }
    public function entry(Request $request){
        $website = ($request->id) ? Website::find($request->id) : new Website();
        return view('admin.website.edit-add', compact('website'));
    }
    public function store(Request $request){
        $website = new Website();
        if ($request->id){
            $website = Website::find($request->id);

        }
        $validator = $this->validateInput($request->all(),$website->rules,$website->message);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $website->fill(($request->all()));
        try {
            $website->save();
            $website_id = $website->id;
            $website_update = Website::find($website_id);
            if ($website_update){
                $website_code = Helper::generateCodeBySpecialName($website->type_website).''.Helper::generateCodeById($website->id);
                try {
                    $website_update->update([
                        'code'=>$website_code,
                    ]);
                }catch (\Exception $e){
                    return redirect(route('admin.websites.index'))->with('fail','Fails');
                }
            }
            return redirect(route('admin.websites.index'))->with('success','Success');
        }catch (\Exception $e){
            return redirect(route('admin.websites.index'))->with('fail','Fails');
        }
    }
    public function destroy(Request $request){
        try {
            $website = Website::find($request->id);
            if ($website == null){
                throw new \Exception();
            }
            $website->delete();
            return redirect()->route('admin.websites.index')->with('success','Success');
        }catch (\Exception $e){
            return redirect()->route('admin.websites.index')->with('fail','Fails');
        }

    }

}
