<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

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
    public function getAll($key, $paginate) {
        $internship_School = db::table('internships')
            ->leftJoin('academic_internships', 'academic_internships.internship_id', 'internships.internship_id')
            ->leftJoin('academic_levels', 'academic_levels.academic_id',  'academic_internships.academic_id')

//            ->leftJoin('project_internships as pro_in', 'pro_in.internship_id',  'internships.internship_id')
//            ->leftJoin('projects as pro', 'pro.project_id',  'pro_in.project_id')
//            ->leftJoin('certificate_internships as ce_in', 'ce_in.internship_id', 'internships.internship_id')
//            ->leftJoin('certificates as ce', 'ce.certificate_id', 'ce_in.certificate_id')

            ->select('internships.*','academic_levels.*')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('internship_topic')
                    ->whereRaw('internship_topic.internship_id=internships.internship_id');
            })
            ->whereNull('internships.deleted_at')
            ->whereNull('academic_internships.deleted_at')
            ->whereNull('academic_levels.deleted_at')
            ->where('internships.name', 'LIKE', '%' . $key . '%')
            //  ->orWhere('academic_levels.school', 'LIKE', '%' . $search . '%')
            ->paginate($paginate);
        return $internship_School;
    }
}
