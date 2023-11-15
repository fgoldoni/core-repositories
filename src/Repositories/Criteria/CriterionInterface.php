<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

interface CriterionInterface
{
    public function apply($model): Builder;
}
