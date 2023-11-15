<?php

/**
 * Created by PhpStorm.
 * User: emere
 * Date: 09/10/2018
 * Time: 11:47.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Select.
 */
class Select
{
    private readonly mixed $fields;

    /**
     * Select constructor.
     */
    public function __construct(...$fields)
    {
        $this->fields = $fields;
    }

    public function apply($model): Builder
    {
        return $model->select($this->fields);
    }
}
