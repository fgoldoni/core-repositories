<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class RegisteredWithinDays
 */
class RegisteredWithinDays
{
    public function __construct(private readonly ?int $days = null)
    {
    }

    public function apply($model): Builder
    {
        return $model->when($this->days, fn ($query) => $query->where('created_at', '>=', now()->subDays($this->days)));
    }
}
