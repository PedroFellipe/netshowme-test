<?php

namespace App\Repositories;

use App\Models\BaseModel;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

}
