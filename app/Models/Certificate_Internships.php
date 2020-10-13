<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Certificate_Internships extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [

    ];
    protected $table = 'certificate_internships';

    protected $fillable = ['internship_id','certificate_id'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [

        ];
    }

}
