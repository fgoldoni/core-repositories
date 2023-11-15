<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 18.11.18
 * Time: 15:17.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Where.
 */
class WhereWithoutAdmin
{
    /**
     * Where constructor.
     */
    public function __construct(private readonly string $column, private readonly ?int $value = null)
    {
    }

    public function apply($model): Builder
    {
        if (auth()->check() && auth()->user()->hasRole(config('app.system.users.roles.administrator'))) {
            return $model->newQuery();
        }

        return $model->when($this->value, fn ($query) => $query->where($this->column, $this->value));
    }
}
