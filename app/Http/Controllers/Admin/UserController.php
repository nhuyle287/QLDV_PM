<?php


namespace App\Http\Controllers\Admin;

use App\Business\UserLogic;
use App\Model\Department;
use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    public $message = [];
    public $rules = [
        'name' => 'required',
        'password' => 'required',
        'email' => 'required|email'
    ];

    public function index(Request $request)
    {
        $user_logic = new UserLogic();
        $users = $user_logic->getListUser($request);
        return view('admin.user.index', compact('users'));
    }

    public function entry(Request $request)
    {
        $user = ($request->id) ? User::find($request->id) : [];
        $roles = Role::whereNull('deleted_at')->get();
        $departments = Department::whereNull('deleted_at')->get();
        return view('admin.user.edit-add', compact(
            'user',
            'roles',
            'departments'
        ));
    }

    public function store(Request $request)
    {
        $user = new User();
        $validator = $this->validateInput($request->all(), $this->rules, $this->message);

        if ($request->id) {
            $user = User::find($request->id);
        }

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $request['title'] = bcrypt($request->name);
        $user->fill($request->all());
        try {
            $user->save();
            return redirect(route('admin.users.index'))->with('notification', 'Success');
        } catch (\Exception $e) {
            return redirect(route('admin.users.index'))->with('fail', 'Fail');
        }
    }
}
