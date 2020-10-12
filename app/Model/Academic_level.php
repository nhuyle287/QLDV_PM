<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Academic_level extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [
        'dateshool' => 'required',
        'school' => 'required',
        'major'=>'required',

        'loai'=>'required',

    ];
    protected $table = 'academic_levels';
    protected $primaryKey='academic_id';
    protected $fillable = ['academic_id','dateschool','school','major','loai'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'dateschool.required' => 'Vui lòng nhập thời gian ',
            'school.required' => 'Vui lòng nhập trường',
            'major.required' => 'Vui lòng nhập chuyên ngành',
            'loai.required'=>'Vui lòng nhập loại',

        ];
    }
    public function internship()
    {
        return $this->hasMany(Internship::class,'internship_id','internship_id');
    }
}
