<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Search
{
    public function __construct(private readonly Closure $closure)
    {
    }

    public function apply($model): Builder
    {
        if (isset($this->closure) && \is_callable($this->closure)) {
            return $model->where($this->closure);
        }

        return $model->newQuery();
    }
}
