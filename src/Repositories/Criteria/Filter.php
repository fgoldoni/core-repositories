<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 24.09.18
 * Time: 23:14.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Filter.
 */
class Filter implements CriterionInterface
{
    /**
     * Filter constructor.
     */
    public function __construct(private readonly ?string $search = null)
    {
    }

    public function apply($model): Builder
    {
        return $model->search($this->search);
    }
}
