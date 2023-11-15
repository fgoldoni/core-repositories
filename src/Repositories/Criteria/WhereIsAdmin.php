<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WhereIsAdmin
 */
class WhereIsAdmin
{
    public function __construct(private readonly string $column, private readonly ?string $value = null)
    {
    }

    public function apply($model): Builder
    {
        if (auth()->user()?->isAdministrator()) {
            return $model->newQuery();
        }

        return $model->when($this->value, fn ($query) => $query->where($this->column, $this->value));
    }
}
