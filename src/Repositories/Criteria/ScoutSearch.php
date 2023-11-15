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
class ScoutSearch implements CriterionInterface
{
    /**
     * ByUser constructor.
     */
    public function __construct(private readonly ?string $query = null)
    {
    }

    public function apply($model): Builder
    {
        $class = $model->getModel()::class;

        if (method_exists($class, 'search')) {
            return $model->when($this->query, fn ($query) => $query->whereIn('id', $class::search($this->query)->keys()));
        }

        return $model->newQuery();
    }
}
