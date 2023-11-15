<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Visible.
 */
class Visible
{
    /**
     * Visible constructor.
     */
    public function __construct(private readonly array $fields)
    {
    }

    /**
     * Set visible fields.
     */
    public function apply($model): Builder
    {
        return $model->setVisible($this->fields);
    }
}
