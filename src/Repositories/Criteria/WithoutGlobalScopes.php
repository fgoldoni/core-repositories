<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 24.09.18
 * Time: 22:40.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class ByUser.
 */
class WithoutGlobalScopes implements CriterionInterface
{
    public function __construct()
    {
    }

    public function apply($model): Builder
    {
        return $model->withoutGlobalScopes();
    }
}
