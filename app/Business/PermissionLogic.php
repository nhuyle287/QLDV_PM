<?php


namespace App\Business;


use App\Model\Permission;

class PermissionLogic extends BaseLogic
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    public function getListPermissionGroupByScreen()
    {
        return $this->model::all()
            ->groupBy('screen_name')
            ->toArray();
    }
}