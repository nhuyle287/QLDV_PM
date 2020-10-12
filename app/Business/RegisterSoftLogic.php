<?php


namespace App\Business;


use App\Model\Customer;
use App\Model\RegisterSoft;
use Illuminate\Support\Facades\Config;

class RegisterSoftLogic extends BaseLogic
{

    public function model()
    {
        return RegisterSoft::class;
    }
    public function getlistregistersoft(){
        $query=$this->model
            ->join('customers as c','c.id','register_soft.id_customer')
            ->join('softwares as sw','sw.id','register_soft.id_software')
            ->join('typesoftwares as ts','ts.id','register_soft.id_typesoftware')
            ->join('users as u','u.id','register_soft.id_staff')
            ->select('register_soft.*','c.name as customer_name','sw.name as software',
            'ts.name as typesoftware','u.name as staff_name',
            'c.email as customer_email')
            ->wherenull('register_soft.deleted_at')
            ->wherenull('c.deleted_at')
        ;
        $query->orderBy('register_soft.id','ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }
    public function getdetailregistersoft($id){
        return $query=RegisterSoft::join('customers as c','c.id','register_soft.id_customer')
            ->join('softwares as sw','sw.id','register_soft.id_software')
            ->join('typesoftwares as ts','ts.id','register_soft.id_typesoftware')
            ->join('users as u','u.id','register_soft.id_staff')
            ->select('register_soft.*','c.name as customer_name','sw.name as software',
                'ts.name as typesoftware','u.name as staff_name',
            'sw.price as price')
            ->wherenull('register_soft.deleted_at')
            ->wherenull('c.deleted_at')
            ->where('register_soft.id',$id)->first();
    }

}
