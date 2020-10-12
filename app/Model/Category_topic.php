<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Category_topic extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [

    ];
    protected $table = 'category_topic';
    protected $primaryKey='category_id';
    protected $fillable = ['category_id','name_category'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [

        ];
    }

}
