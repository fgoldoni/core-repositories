<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 24.09.18
 * Time: 22:46.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class EagerLoad.
 */
class EagerLoad implements CriterionInterface
{
    /**
     * EagerLoad constructor.
     */
    public function __construct(protected array $relations)
    {
    }

    public function apply($model): Builder
    {
        return $model->with($this->relations);
    }
}
