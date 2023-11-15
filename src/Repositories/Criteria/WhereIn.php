<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WhereIn.
 */
class WhereIn
{
    public function __construct(private readonly string $column, private readonly ?array $values = null)
    {
    }

    public function apply($model): Builder
    {
        return $model->when($this->values, function (Builder $query) {
            $query->whereIn($this->column, $this->values);
        });
    }
}
