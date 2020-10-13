<?php
/**
 * Created by PhpStorm.
 * User: ASTO-22
 * Date: 11/4/2019
 * Time: 11:28
 */

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends AdminController
{
    public function index(Request $request)
    {
        return view('index');
//        $month = array('Jan', 'Feb', 'Mar', 'Apr', 'May');
//
//        $data  = DB::table('receipt')
//            ->select('id',DB::raw('SUM(price) as price'))
//            ->groupBy('id');
//      //  dd($data);
//        return view('index',['Months' => $month, 'Data' => $data]);
    }
//    public function Chartjs(){
//        $month = array('Jan', 'Feb', 'Mar', 'Apr', 'May');
//        $data  = DB::table('receipt')->sum('price')->orderby('');
//        return view('index',['Months' => $month, 'Data' => $data]);
//    }
}
