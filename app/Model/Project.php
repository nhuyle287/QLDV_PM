<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Project extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [

    ];
    protected $table = 'projects';
    protected $primaryKey='project_id';
    protected $fillable = ['project_id','date_project','name_project','name_company','content_job'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [

        ];
    }
//    public function internship()
//    {
//        return $this->belongsToMany(Internship::class, 'project_internships');
//    }
}
