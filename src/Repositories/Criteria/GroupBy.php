<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class GroupBy
 */
class GroupBy
{
    public function __construct(private readonly ?string $column = null)
    {
    }

    public function apply($model): Builder
    {
        return $model->when($this->column, fn ($query) => $query->groupBy($this->column));
    }
}
