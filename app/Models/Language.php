<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Language extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [

    ];
    protected $table = 'languages';
    protected $primaryKey='languages_id';
    protected $fillable = ['languages_id','language_name','listen','speak','read','write'];
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
