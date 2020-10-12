<?php


namespace App\Business;


use App\Model\Product;
use Illuminate\Support\Facades\Config;

class ProductLogic extends BaseLogic
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    public function getListProduct($search)
    {
        $query = $this->model->join('units as u', 'u.id', 'products.id_unit')
            ->join('customers as d', 'd.id', 'products.id_customer')
            ->select('products.*', 'u.name as unit_name', 'd.name as customer_name')
            ->whereNull('u.deleted_at')
            ->whereNull('d.deleted_at');
        if ($search) {
            if (isset($search->page) && is_numeric($search->page)) {
                $query->offset($search->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('products.id', 'DESC');
        return $query->paginate(Config::get('constants.pagination'));
    }
}
