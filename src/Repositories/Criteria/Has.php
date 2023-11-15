<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Has.
 */
class Has
{
    /**
     * Has constructor.
     */
    public function __construct(private $relation)
    {
    }

    /**
     * Check if entity has relation.
     */
    public function apply($model): Builder
    {
        return $model->has($this->relation);
    }
}
