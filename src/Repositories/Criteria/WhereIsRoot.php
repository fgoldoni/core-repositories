<?php

/**
 * Created by PhpStorm.
 * User: emere
 * Date: 23/10/2018
 * Time: 12:25.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class whereIsRoot.
 */
class WhereIsRoot
{
    public function apply($model): Builder
    {
        return $model->whereIsRoot();
    }
}
