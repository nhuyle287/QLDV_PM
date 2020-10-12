<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Internship extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:internships,email,NULL,internship_id,deleted_at,NULL',
      //  'cmnd' => 'required|cmnd|unique:internships,cmnd,NULL,internship_id,deleted_at,NULL',
        'address'=>'required',
        'birthday'=>'required',
        'start_date' => 'required',
       // 'end_date' => 'required|after_or_equal:start_date',
        'gender'=>'required',
        'phone'=>'required'
    ];
    protected $table = 'internships';
    protected $primaryKey='internship_id';
    protected $fillable = ['internship_id','name','email','address','birthday','image','start_date','phone','gender','name_family','phone_family','cmnd','addresscurrent','range_date','issued_by','position','status'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên thực tập sinh ',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
//            'cmnd.required' => 'Vui lòng nhập cmnd',
//            'cmnd.unique' => 'CMND đã tồn tại',
            'address.required'=>'Vui lòng nhập địa chỉ',
        //    'image.required'=>'Vui lòng điền hình ảnh',
            'start_date.required' => 'Vui lòng nhập ngày bắt đầu',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'gender.required'=>'Vui lòng nhập giới tính',
           // 'end_date.required' => 'Vui lòng nhập ngày kết thúc',
          //  'end_date.after_or_equal' => 'Ngày kết thúc lớn hơn hoặc bằng ngày bắt đầu',
        ];
    }
//    public function topic()
//    {
//        return $this->belongsTo('App\Model\Internship', 'idtopic', 'id');
//    }
//    public function project()
//    {
//        return $this->belongsToMany(Project::class, 'project_internships');
//    }
//    public function languages()
//    {
//        return $this->belongsToMany(Language::class,'languages_internships');
//    }
//    public function certificate()
//    {
//        return $this->belongsToMany(Certificate::class, 'certificate_internships');
//    }
//    public function academic_level()
//    {
//        return $this->belongsToMany(Academic_level::class, 'academic_internships');
//    }
}
