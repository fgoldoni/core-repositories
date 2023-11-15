<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 24.09.18
 * Time: 23:02.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class OrderBy.
 */
class OrderBy implements CriterionInterface
{
    public function __construct(private $column = null, private $dir = 'asc')
    {
    }

    public function apply($model): Builder
    {
        return $model->when($this->column, fn ($query) => $query->orderBy($this->column, $this->dir));
    }
}
