<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

class WhereRole
{
    public function __construct(private readonly ?int $id = null)
    {
    }

    public function apply($model): Builder
    {
        return $model->when($this->id, fn ($query) => $query->role($this->id));
    }
}
