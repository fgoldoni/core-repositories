<?php

namespace Goldoni\CoreRepositories\Repositories;

use Goldoni\CoreRepositories\Repositories\Contracts\RepositoryInterface;
use Goldoni\CoreRepositories\Repositories\Criteria\CriteriaInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

/**
 * Class RepositoryAbstract.
 */
abstract class RepositoryAbstract implements RepositoryInterface, CriteriaInterface
{
    protected $model;

    public function __construct(private readonly Arr $arr)
    {
        $this->model = $this->resolveModel();
    }

    abstract public function model();

    public function all($columns = ['*']): Collection
    {
        return $this->model->get($columns);
    }

    public function get($columns = ['*'])
    {
        return $this->all($columns);
    }

    /**
     * @param  mixed  ...$criteria
     * @return $this
     */
    public function withCriteria(...$criteria)
    {
        $criteria = $this->arr->flatten($criteria);

        foreach ($criteria as $criterion) {
            $this->model = $criterion->apply($this->model);
        }

        return $this;
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * @param  array  $columns
     * @return mixed
     */
    public function first($columns = ['*'])
    {
        return $this->model->firstOrFail($columns);
    }

    public function exists()
    {
        return $this->model->exists();
    }

    public function doesntExist()
    {
        return $this->model->doesntExist();
    }

    public function findWhere(string $column, $value = null, $columns = ['*'])
    {
        $model = $this->model->where($column, $value)->get($columns);
        $this->modelNotFoundException($model);

        return $model;
    }

    public function findWhereDate(string $column, string $op = '=', $value = null, $columns = ['*'])
    {
        $model = $this->model->whereDate($column, $op, $value)->get($columns);
        $this->modelNotFoundException($model);

        return $model;
    }

    public function findWhereFirst(string $column, $value, $columns = ['*'])
    {
        $model = $this->model->where($column, $value)->first($columns);
        $this->modelNotFoundException($model);

        return $model;
    }

    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        $model = $this->model->whereIn($field, $values)->get($columns);
        $this->modelNotFoundException($model);

        return $model;
    }

    public function findWhereNotIn($field, array $values, $columns = ['*'])
    {
        $model = $this->model->whereNotIn($field, $values)->get($columns);
        $this->modelNotFoundException($model);

        return $model;
    }

    public function paginate(int $perPage = null, $columns = ['*'], $method = 'paginate'): LengthAwarePaginator
    {
        $perPage ??= request()->get('perPage', 10);

        return $this->model->{$method}($perPage, $columns);
    }

    public function count(): int
    {
        return $this->model->count();
    }

    public function sum(string $column)
    {
        return $this->model->sum($column);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->find($id);
        $record->update($data);

        return $record;
    }

    public function delete(string $id)
    {
        $record = $this->find($id);
        $record->delete();

        return $record;
    }

    public function deleteAll(): ?bool
    {
        return $this->model->delete();
    }

    public function forceDeleteAll(): ?bool
    {
        return $this->model->forceDelete();
    }

    public function forceDelete(int $id)
    {
        $record = $this->model->onlyTrashed()->findOrFail($id);
        $record->forceDelete();

        return $record;
    }

    public function restore(int $id)
    {
        $record = $this->model->onlyTrashed()->findOrFail($id);
        $record->restore();

        return $record;
    }

    protected function resolveModel()
    {
        $model = app()->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $model;
    }

    private function modelNotFoundException($model)
    {
        if (!$model) {
            throw (new ModelNotFoundException())->setModel($this->model->getModel()::class);
        }
    }

    public function pluck($column, $key = null)
    {
        return $this->model->pluck($column, $key);
    }

    public function sync($id, $relation, $attributes, $detaching = true)
    {
        return $this->find($id)->{$relation}()->sync($attributes, $detaching);
    }

    public function detach($id, $relation, $attributes)
    {
        return $this->find($id)->{$relation}()->detach($attributes);
    }

    public function syncWithoutDetaching($id, $relation, $attributes)
    {
        return $this->sync($id, $relation, $attributes, false);
    }

    public function firstOrNew(array $attributes = [])
    {
        return $this->model->firstOrNew($attributes);
    }

    public function firstOrCreate(array $attributes = [])
    {
        return $this->model->firstOrCreate($attributes);
    }

    public function setHidden(string $attribute)
    {
        return $this->model->makeHidden($attribute);
    }

    public function setVisible(string $attribute)
    {
        return $this->model->makeVisible($attribute);
    }

    public function make(array $attributes = [])
    {
        return $this->model->make($attributes);
    }
}
