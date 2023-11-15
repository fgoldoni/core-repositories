<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WhereHas.
 */
class WhereHas
{
    public function __construct(private readonly string $relation, private $closure)
    {
    }

    public function apply($model): Builder
    {
        if (auth()->user()?->hasRole(config('app.system.users.roles.administrator'))) {
            return $model->newQuery();
        }

        return $model->whereHas($this->relation, $this->closure);
    }
}
