<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Hidden.
 */
class Hidden
{
    /**
     * Hidden constructor.
     */
    public function __construct(private readonly array $fields)
    {
    }

    /**
     * Set hidden fields.
     */
    public function apply($model): Builder
    {
        return $model->setHidden($this->fields);
    }
}
