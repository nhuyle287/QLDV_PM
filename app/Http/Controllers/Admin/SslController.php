<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Hosting;
use App\Models\Ssl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class SslController extends AdminController
{
    //
    public function index()
    {
        $ssls = Ssl::paginate(Config::get('constants.pagination'));
        return view('admin.ssl.index', compact('ssls'));
    }

    public function show(Request $request)
    {
        $ssl = Ssl::find($request->id);
        return view('admin.ssl.show', compact('ssl'));
    }

    public function entry(Request $request)
    {
        $ssl = ($request->id) ? Ssl::find($request->id) : new Ssl();
        return view('admin.ssl.edit-add', compact('ssl'));
    }

    public function store(Request $request)
    {
        $ssl = new Ssl();
//        dd($request->all());
        if ($request->id) {
            $ssl = Ssl::find($request->id);
        }
        $validator = $this->validateInput($request->all(), $ssl->rules, $ssl->message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $ssl->fill($request->all());
//        dd($request->all());
        try {
            $ssl->save();
            $ssl_id = $ssl->id;
            $ssl_update = Ssl::find($ssl_id);
            if ($ssl_update) {
                $ssl_code = Helper::generateCodeByName($ssl->name);
                try {
                    $ssl_update->update([
                        'code' => $ssl_code,
                    ]);
                } catch (\Exception $e) {
                    return redirect(route('admin.ssls.index'))->with('fail', 'Thất Bại');
                }
            }

            return redirect(route('admin.ssls.index'))->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect(route('admin.ssls.index'))->with('fail', 'Thất Bại');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $ssl = Ssl::find($request->id);
            if ($ssl == null) {
                throw new \Exception();
            }
            $ssl->delete();
            return redirect()->route('admin.ssls.index')->with('success', 'Thành Công');
        } catch (\Exception $e) {
            return redirect()->route('admin.ssls.index')->with('fails', 'Thất Bại');
        }
    }
}
