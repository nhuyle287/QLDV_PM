<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FunctionDifferent extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [

    ];
    protected $table = 'model_different';
    protected $primaryKey='id';
    protected $fillable = ['id', 'function_different_name'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [


        ];
    }
}

