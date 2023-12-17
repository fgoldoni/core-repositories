<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;


class WhereNotIn
{
    public function __construct(private readonly string $column, private readonly ?array $values = null)
    {
    }

    public function apply($model): Builder
    {
        return $model->when($this->values, function (Builder $query) {
            $query->whereNotIn($this->column, $this->values);
        });
    }
}
