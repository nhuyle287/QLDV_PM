<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractModelHome extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [

    ];
    protected $table = 'contract_model_home';
    protected $primaryKey='id';
    protected $fillable = ['id','id_home','id_contract'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [


        ];
    }
}

