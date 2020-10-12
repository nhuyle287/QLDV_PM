<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class TypeSoftware extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $message = [];
    public $rules = [
        'name' => 'required|unique:typesoftwares',
        'description' => 'required'
    ];
    protected $table = 'typesoftwares';
    protected $fillable = ['id', 'name', 'description'];

    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'name.required' => 'Vui lòng nhập tên loại phần mềm',
            'name.unique' => 'Tên loại không được trùng',
            'description.required' => 'Vui lòng nhập mô tả cho loại phần mềm',
        ];
    }

    public function get_all($key, $paginate)
    {
        $type_software = db::table('typesoftwares')
            ->select('typesoftwares.*')
            ->whereNull('typesoftwares.deleted_at')
            ->where('typesoftwares .name', 'LIKE', '%' . $key . '%')
            ->orderBy('typesoftwares.id', 'ASC')
            ->paginate($paginate);
        return $type_software;
    }
}
