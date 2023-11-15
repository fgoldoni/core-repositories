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
class WhereOp
{
    /**
     * Where constructor.
     */
    public function __construct(private readonly string $column, private readonly string $op, private readonly string|bool|int|null $value = null)
    {
    }

    public function apply($model): Builder
    {
        ds($this->column, $this->op, $this->value);
        return $model->when($this->value, fn ($query) => $query->where($this->column, '<', $this->value));
    }
}
