<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Topic extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [
        'name' => 'required',
//        'start_date' => 'required',
//        'end_date' => 'required|after_or_equal:start_date',

    ];
    protected $table = 'topics';
    protected $primaryKey='id';
    protected $fillable = ['id','name','description','category_id','support'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên đề tài ',
//            'start_date.required' => 'Vui lòng nhập ngày bắt đầu',
//            'end_date.required' => 'Vui lòng nhập ngày kết thúc',
//            'end_date.after_or_equal' => 'Ngày kết thúc lớn hơn hoặc bằng ngày bắt đầu',
        ];
    }
//    public function category_topic()
//    {
//        return $this->belongsTo('App\Model\Category_topic', 'category_id', 'category_id');
//    }
}
