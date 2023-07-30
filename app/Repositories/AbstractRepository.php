<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    abstract public function getModelClass(): string;

    public function setModel($model_path)
    {
        $this->model = app($model_path);
    }

    public function __construct()
    {
        $this->setModel($this->getModelClass());
    }

    public function getOneById($id): ?Model
    {
        return $this->model->find($id);
    }

    public function getByIds(array $ids): Collection
    {
        return $this->model->whereIn($this->model->getKeyName(), $ids)->get();
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getQuery()
    {
        return $this->model->query();
    }
}
