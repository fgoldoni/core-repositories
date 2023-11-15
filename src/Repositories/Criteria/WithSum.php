<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WithCount.
 */
class WithSum
{
    /**
     * WithCount constructor.
     */
    public function __construct(private readonly string $relation, private readonly string $column)
    {
    }

    public function apply($model): Builder
    {
        return $model->withSum($this->relation, $this->column);
    }
}
