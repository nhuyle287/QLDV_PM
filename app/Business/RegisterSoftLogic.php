<?php


namespace App\Business;


use App\Models\Customer;
use App\Models\RegisterSoft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class RegisterSoftLogic extends BaseLogic
{

    public function model()
    {
        return RegisterSoft::class;
    }
    public function search(Request $request){
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
            ->wherenull('sw.deleted_at')
            ->wherenull('u.deleted_at')
            ->where('register_soft.transaction', '!=', "0")
        ;

        if ($request) {
            if (isset($request->key)) {
                $query->where('c.name', 'LIKE', '%' . $request->key . '%');
                $query->orwhere('sw.name', 'LIKE', '%' . $request->key . '%');
            }

        }
        $query->orderBy('register_soft.id','ASC');
        return $query->get();
    }

    public function getlistregistersoft($key, $paginate){
        $query=$this->model
            ->join('customers as c','c.id','register_soft.id_customer')
            ->join('softwares as sw','sw.id','register_soft.id_software')
            ->join('typesoftwares as ts','ts.id','register_soft.id_typesoftware')
            ->join('users as u','u.id','register_soft.id_staff')
            ->select('register_soft.*','c.name as customer_name','sw.name as software',
            'ts.name as typesoftware','u.name as staff_name',
            'c.email as customer_email')
            ->wherenull('register_soft.deleted_at')
            ->wherenull('c.deleted_at');
        $query->orderBy('register_soft.id','ASC');
        $query->where('c.name', 'LIKE', '%' . $key . '%');
        return $query->paginate($paginate);
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

    //danh sách đơn hàng đã đaewng ký phần mềm
    public function getlistregisteredsoft(){
        $query=$this->model
            ->join('customers as c','c.id','register_soft.id_customer')
            ->join('softwares as sw','sw.id','register_soft.id_software')
            ->join('typesoftwares as ts','ts.id','register_soft.id_typesoftware')
            ->join('users as u','u.id','register_soft.id_staff')
            ->select('register_soft.*','c.name as customer_name','sw.name as software',
                'ts.name as typesoftware','u.name as staff_name',
                'c.email as customer_email',
               'sw.price as softwares_price')
            ->wherenull('register_soft.deleted_at')
            ->wherenull('c.deleted_at')
            ->where('register_soft.transaction', '!=', "0")
        ;
        $query->orderBy('register_soft.id','ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }
    //quản lý đơn hàng phần mềm
    public function Searchsoft(Request $request)
    {
        $query =  RegisterSoft::join('customers as c','c.id','register_soft.id_customer')
            ->join('softwares as sw','sw.id','register_soft.id_software')
            ->join('typesoftwares as ts','ts.id','register_soft.id_typesoftware')
            ->join('users as u','u.id','register_soft.id_staff')
            ->select('register_soft.*','c.name as customer_name','c.email as customer_email'
                ,'sw.name as software',
                'ts.name as typesoftware','u.name as staff_name',
                'sw.price as price')
            ->whereNull('c.deleted_at')
            ->whereNull('sw.deleted_at')
            ->whereNull('ts.deleted_at')
            ->whereNull('u.deleted_at');
        if ($request) {
            if (isset($request->name)) {
                $query->where('c.name', 'LIKE', '%' . $request->name . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_soft.id', 'ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }

}
