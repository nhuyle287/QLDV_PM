<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FunctionHome extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [

    ];
    protected $table = 'model_home';
    protected $primaryKey='id';
    protected $fillable = ['id', 'function_home_name'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [


        ];
    }
}

