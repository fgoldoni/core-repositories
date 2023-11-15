<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ByCustomerOrProvider implements CriterionInterface
{
    public function __construct(private readonly int $userId)
    {
    }

    public function apply($model): Builder
    {
        if (Auth::user()->isAdministrator()) {
            return $model->newQuery();
        }

        return $model->where('customer_id', $this->userId)->orWhere('provider_id', $this->userId);
    }
}
