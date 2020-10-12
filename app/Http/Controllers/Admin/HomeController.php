<?php
/**
 * Created by PhpStorm.
 * User: ASTO-22
 * Date: 11/4/2019
 * Time: 11:28
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController extends AdminController
{
    public function index(Request $request)
    {
        return view('index');
    }
}