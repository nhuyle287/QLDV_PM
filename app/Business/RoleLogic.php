<?php


namespace App\Business;

use App\Models\Role;
use Illuminate\Support\Facades\Config;

class RoleLogic extends BaseLogic
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    public function getListRoles($search)
    {
        $query = $this->model->whereNull('deleted_at');
        if ($search) {
            if (isset($search->page) && is_numeric($search->page)) {
                $query->offset($search->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('id', 'DESC');
        return $query->paginate(Config::get('constants.pagination'));
    }

}
