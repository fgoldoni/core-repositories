<?php

namespace Goldoni\CoreRepositories\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    public function all($columns = ['*']): Collection;

    public function get($columns = ['*']);

    public function find(int|string|Model $id, $columns = ['*']);

    public function first($columns = ['*']);

    public function findWhere(string $column, $value = null, $columns = ['*']);

    public function findWhereDate(string $column, string $op = '=', $value = null, $columns = ['*']);

    public function findWhereFirst(string $column, $value, $columns = ['*']);

    public function findWhereIn($field, array $values, $columns = ['*']);

    public function findWhereNotIn($field, array $values, $columns = ['*']);

    public function paginate(?int $perPage = null, $columns = ['*'], $method = 'paginate'): LengthAwarePaginator;

    public function count(): int;

    public function sum(string $column);

    public function create(array $data);

    public function update(int|string|Model $id, array $data);

    public function delete(int|string|Model $id);

    public function forceDelete(int|string|Model $id);

    public function deleteAll(): ?bool;

    public function findWithoutScopes($id, $columns = ['*']);

    public function restore(int|string|Model $id);

    public function pluck($column, $key = null);

    public function sync(int|string|Model $id, $relation, $attributes, $detaching = true);

    public function syncWithoutDetaching(int|string|Model $id, $relation, $attributes);

    public function firstOrNew(array $attributes = []);

    public function firstOrCreate(array $attributes = []);

    public function setHidden(string $attribute);

    public function setVisible(string $attribute);

    public function make(array $attributes = []);
}
