<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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
    public function get_all($key, $paginate)
    {
        $category_topic = db::table('category_topic')
            ->select('category_topic.*')
            ->whereNull('category_topic.deleted_at')
            ->where('category_topic.name_category', 'LIKE', '%' . $key . '%')
            ->orderBy('category_topic.category_id', 'ASC')
            ->paginate($paginate);
        return $category_topic;
    }
}
