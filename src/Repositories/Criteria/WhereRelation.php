<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class whereRelation
 */
class WhereRelation
{
    public function __construct(private readonly string $relation, private readonly string $column, private readonly string $op, private readonly string $value)
    {
    }

    public function apply($model): Builder
    {
        return $model->whereRelation($this->relation, $this->column, $this->op, $this->value);
    }
}
