<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class  InternshipTopic extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [

    ];
    protected $table = 'internship_topic';
    protected $primaryKey='internship_id';
    protected $fillable = ['internship_id','certificate_id','start_date','end_date'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [

        ];
    }

    public function getAll($key, $paginate) {
        $internship_School = db::table('internships')
            ->join('academic_internships', 'academic_internships.internship_id', '=', 'internships.internship_id')
            ->join('academic_levels', 'academic_levels.academic_id', '=', 'academic_internships.academic_id')
            ->join('internship_topic', 'internships.internship_id', '=', 'internship_topic.internship_id')
            ->select('internships.internship_id', 'internships.name', 'internships.email', 'internships.phone', 'academic_levels.school', 'academic_levels.major', 'internships.date_create', 'internships.status')
            ->whereNull('internships.deleted_at')
            ->whereNull('academic_internships.deleted_at')
            ->whereNull('academic_levels.deleted_at')
            ->whereNull('internship_topic.deleted_at')
            ->where('internships.name', 'LIKE', '%' . $key . '%')
            ->paginate($paginate);
        return $internship_School;
    }
}
