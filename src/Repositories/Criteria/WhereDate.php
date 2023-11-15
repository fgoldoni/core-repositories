<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 17.11.18
 * Time: 23:53.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WhereDate.
 */
class WhereDate
{
    /**
     * WhereDate constructor.
     */
    public function __construct(private readonly string $column, private $value)
    {
    }

    public function apply($model): Builder
    {
        return $model->whereDate($this->column, $this->value);
    }
}
