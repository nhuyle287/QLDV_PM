<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractModelProduct extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [

    ];
    protected $table = 'contract_model_product';
    protected $primaryKey='id';
    protected $fillable = ['id', 'id_product','id_contract'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [


        ];
    }
}

