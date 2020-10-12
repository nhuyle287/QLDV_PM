<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Academic_Internships extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [

    ];
    protected $table = 'academic_internships';

    protected $fillable = ['internship_id', 'academic_id'];

    public function __construct()
    {
        parent::__construct();
        $this->message = [

        ];
    }


}
