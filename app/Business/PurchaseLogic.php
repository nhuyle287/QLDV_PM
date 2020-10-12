<?php


namespace App\Business;


use App\Model\Purchase;
use Illuminate\Support\Facades\Config;

class PurchaseLogic extends BaseLogic
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Purchase::class;
    }

    public function getListPurchases($search)
    {
        $query = $this->model->join('customers as c', 'c.id', 'purchar_orders.id_customer')
            ->join('users as u', 'u.id', 'purchar_orders.id_user')
            ->select('purchar_orders.*', 'c.name as customer_name', 'u.name as created_name')
            ->whereNull('purchar_orders.deleted_at')
            ->whereNull('c.deleted_at');
        if ($search) {
            if (isset($search->page) && is_numeric($search->page)) {
                $query->offset($search->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('purchar_orders.id', 'DESC');
        return $query->paginate(Config::get('constants.pagination'));
    }
}