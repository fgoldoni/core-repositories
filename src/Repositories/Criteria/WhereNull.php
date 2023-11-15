<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 20.11.18
 * Time: 17:08.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WhereNull.
 */
class WhereNull
{
    /**
     * WhereNull constructor.
     */
    public function __construct(private readonly string $column)
    {
    }

    public function apply($model): Builder
    {
        return $model->whereNull($this->column);
    }
}
