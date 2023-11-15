<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Take.
 */
class Take
{
    /**
     * Take constructor.
     */
    public function __construct(private readonly int $number)
    {
    }

    /**
     * Set hidden fields.
     */
    public function apply($model): Builder
    {
        return $model->take($this->number);
    }
}
