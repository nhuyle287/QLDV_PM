<?php


namespace App\Business;


use App\Model\User;
use Illuminate\Support\Facades\Config;

class UserLogic extends BaseLogic
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function getListUser($search)
    {
        $query = $this->model
            ->join('roles as r', 'r.id', 'users.id_role')
            ->leftJoin('department as d', 'd.id', 'users.id_department')
            ->select('users.*', 'r.title as role_name', 'd.name as department_name')
            ->whereNull('r.deleted_at')
            ->whereNull('d.deleted_at');
        if ($search) {
            if (isset($search->page) && is_numeric($search->page)) {
                $query->offset($search->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('users.id', 'DESC');
        return $query->paginate(Config::get('constants.pagination'));
    }
}
