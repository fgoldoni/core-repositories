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
class ByUser implements CriterionInterface
{
    /**
     * ByUser constructor.
     */
    public function __construct(private readonly int $userId)
    {
    }

    public function apply($model): Builder
    {
        if (auth()->user()?->isAdministrator()) {
            return $model->newQuery();
        }

        return $model->where('user_id', $this->userId);
    }
}
