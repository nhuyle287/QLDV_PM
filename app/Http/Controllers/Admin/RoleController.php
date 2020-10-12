<?php


namespace App\Http\Controllers\Admin;

use App\Business\PermissionLogic;
use App\Business\RoleLogic;
use App\Model\Customer;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RoleController extends AdminController
{
    public function index(Request $request)
    {
        $search = (object)$request->only(['page']);
        $role_logic = new RoleLogic();
        $roles = $role_logic->getListRoles($search);

        return view('admin.role.index', compact('roles'));
    }

    public function entry(Request $request)
    {
        $pemission_logic = new PermissionLogic();
        $permission_list = $pemission_logic->getListPermissionGroupByScreen();
        $choose_permission = [];
        $role = ($request->id) ? Role::find($request->id) : [];
        if ($request->id) {
            $choose_permission = DB::table('permission_role')
                ->select('permission_id')
                ->where('role_id', $request->id)
                ->pluck('permission_id')
                ->all();
        }
        return view('admin.role.edit-add', compact(
            'role',
            'permission_list',
            'choose_permission'
        ));
    }

    public function store(Request $request)
    {
        $role = new Role();
        $validator = $this->validateInput($request->all(), $role->rules, $role->message);

        if ($request->id) {
            $role = Role::find($request->id);
        }

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $role->fill($request->all());
        try {
            $role->save();
            if ($request->permissions) {
                $choose_permission = DB::table('permission_role')
                    ->select('permission_id')
                    ->where('role_id', $request->id)
                    ->pluck('permission_id')
                    ->all();
                //delete old permissions
                foreach ($choose_permission as $per) {
                    DB::table('permission_role')->delete([$per]);
                }
                foreach ($request->permissions as $permission) {
                    DB::table('permission_role')->insert([
                        'role_id' => $role->id,
                        'permission_id' => $permission
                    ]);
                }
            }
            return redirect(route('admin.roles.index'))->with('notification', 'Success');
        } catch (\Exception $e) {
            return redirect(route('admin.roles.index'))->with('fail', 'Fail');
        }
    }

    public function show(Request $request)
    {

        $role = Role::find($request->id);
        return view('admin.role.show', compact(
            'role'
        ));
    }

    public function destroy(Request $request)
    {
        try {
            $customer = Role::find($request->id);

            if ($customer == null) {
                throw new \Exception();
            }
            $customer->delete();
            return redirect()->route('admin.customers.index')->with('success', 'Thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.customers.index')->with('fail', 'Lỗi');
        }
    }
}
