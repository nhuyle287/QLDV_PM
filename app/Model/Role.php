<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [
        'title' => 'required',
    ];
    protected $table = 'roles';
    protected $fillable = ['id', 'title', 'description'];

    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'title.required' => 'Vui lòng nhập tên phân quyền',
        ];
    }
}