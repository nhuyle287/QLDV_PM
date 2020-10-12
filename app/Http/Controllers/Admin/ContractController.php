<?php


namespace App\Http\Controllers\Admin;

use App\Model\Customer;
use App\Model\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ContractController extends AdminController
{
    public function software()
    {
        $info = Customer::all();
        $software=Software::all();
        return view('admin.contract.software', compact('info','software'));

    }

    public function view(Request $request)
    {
//        $nameA=$request->nameA;
//        return view('admin.contract.view', compact());

    }

}
