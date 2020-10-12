<?php

declare(strict_types=1);

namespace App\Business;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 */
abstract class BaseLogic
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    abstract public function model();

    public function makeModel()
    {
        $model = app($this->model());

        $this->model = $model;

        return $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param mixed
     * @param mixed $ids
     * @param mixed $columns
     */
    public function find($ids, $columns = ['*'])
    {
        return $this->model->find($ids);
    }

    /**
     * Update data
     * @param int $id
     * @param array $data
     *
     * @return bool
     */
    public function update($id, $data)
    {
        $model = $this->model->find($id);

        if ($model) {
            $model->fill($data)->save();
        }

        return true;
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }
}
