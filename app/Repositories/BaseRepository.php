<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryContract{

    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    public function allTrashed(): Collection
    {
        return $this->model->onlyTrashed()->get();
    }

    public function findById(int $modelId, array $columns = ['*'], array $relations = [], array $appends = []): ?Model
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->appends($appends);
    }

    public function findTrashedById(int $modelId): ?Model
    {
        return $this->model->withTrashed()->findOrFail($modelId);
    }

    public function findOnlyTrashedById(int $modelId): ?Model
    {
        return $this->model->onlyTrashed()->findOrFail($modelId);
    }

    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function update(int $modelId, array $payload): bool
    {
        $model = $this->findById($modelId);
        return $model->update($payload);
    }

    public function deletebyId(int $modelId): bool
    {
        return $this->model->findById($modelId)->delete();
    }

    public function restoreById(int $modelId): bool
    {
        return $this->model->findOnlyTrashedById($modelId)->restore();
    }

    public function permanentlyDeleteById(int $modelId): bool
    {
        return $this->model->findOnlyTrashedById($modelId)->forceDelete();
    }
}
