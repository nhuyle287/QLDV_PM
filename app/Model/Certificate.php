<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Certificate extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $message = [];
    public $rules = [

    ];
    protected $table = 'certificates';
    protected $primaryKey='certificate_id';
    protected $fillable = ['certificate_id','date_cc','name_certificate','training_places','score'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [

        ];
    }
//    public function internship()
//    {
//        return $this->belongsToMany(Internship::class, 'certificate_intenships');
//    }
}
