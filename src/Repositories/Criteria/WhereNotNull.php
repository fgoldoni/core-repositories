<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 20.11.18
 * Time: 17:14.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WhereNotNull.
 */
class WhereNotNull
{
    /**
     * WhereNull constructor.
     */
    public function __construct(private readonly string $column)
    {
    }

    public function apply($model): Builder
    {
        return $model->whereNotNull($this->column);
    }
}
