<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

class WhereKey
{
    public function __construct(private readonly ?array $values = null)
    {
    }

    public function apply($model): Builder
    {
        return $model->when($this->values, fn ($query, $values) => $query->whereKey($this->values));
    }
}
