<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 24.09.18
 * Time: 23:55.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WithTrashed.
 */
class Distinct implements CriterionInterface
{
    public function apply($model): Builder
    {
        return $model->distinct();
    }
}
