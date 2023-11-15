<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 24.11.18
 * Time: 15:33.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class isPublished.
 */
class WherePublished
{
    public function __construct()
    {
    }

    public function apply($model): Builder
    {
        return $model->published();
    }
}
