<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

}
