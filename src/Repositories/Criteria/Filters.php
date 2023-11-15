<?php

/**
 * Created by PhpStorm.
 * User: goldoni
 * Date: 18.11.18
 * Time: 15:17.
 */

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

/**
 * Class Where.
 */
class Filters
{
    /**
     * Where constructor.
     */
    public function __construct(private readonly ?array $filters = [])
    {
    }

    public function apply($model): Builder
    {
        $query = null;
        $isFiltered = false;

        if (isset($this->filters['search'])) {
            $isFiltered = true;
            $attributes = ['jobs.id', 'jobs.name'];

            $query = $model->when($this->filters['search'], function ($query, $search) use ($attributes) {
                $query->where(function ($query) use ($search, $attributes) {
                    foreach (Arr::wrap($attributes) as $attribute) {
                        $query->orWhere($attribute, 'like', '%'.$search.'%');
                    }
                });
            });
        }

        if (isset($this->filters['categories'])) {
            $isFiltered = true;

            $query = $model->when(
                $this->filters['categories'],
                fn ($query, $categories) => $query->whereHas(
                    'categories',
                    fn (Builder $query) => $query->whereIn('categories.id', $categories)
                )
            );
        }

        if (isset($this->filters['days'])) {
            $isFiltered = true;

            $query = $model->when(
                $this->filters['days'],
                fn ($query, $days) => $query->liveWithinDays($days)
            );
        }

        return $isFiltered ? $query : $model->newQuery();
    }
}
