<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WhereNot
 */
class WhereNot
{
    /**
     * Where constructor.
     */
    public function __construct(private readonly string $column, private readonly int $value)
    {
    }

    public function apply($model): Builder
    {
        return $model->when($this->value, fn ($query, $value) => $query->whereNot($this->column, $this->value));
    }
}
