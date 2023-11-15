<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class WhereLike
 */
class Limit
{
    public function __construct(private readonly ?int $limit = null)
    {
    }

    public function apply($model): Builder
    {
        return $model->when($this->limit, function ($query, $limit) {
            $query->limit($limit);
        });
    }
}
