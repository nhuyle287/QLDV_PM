<?php
/**
 * Created by PhpStorm.
 * User: ASTO-22
 * Date: 11/4/2019
 * Time: 10:40
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validateInput($request, $rules, $messages)
    {
        return Validator::make(
            $request,
            $rules,
            $messages
        );
    }
}