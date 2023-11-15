<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 24.09.18
 * Time: 22:20.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class LatestFirst.
 */
class Latest implements CriterionInterface
{
    public function apply($model): Builder
    {
        return $model->latest();
    }
}
