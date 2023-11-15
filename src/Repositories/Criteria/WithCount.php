<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WithCount.
 */
class WithCount
{
    /**
     * WithCount constructor.
     */
    public function __construct(private readonly array $relations)
    {
    }

    public function apply($model): Builder
    {
        return $model->withCount($this->relations);
    }
}
