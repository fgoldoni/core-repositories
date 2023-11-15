<?php

namespace Goldoni\CoreRepositories\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class WhereLike
 */
class WhereLike
{
    public function __construct(private readonly array $attributes = [], private readonly ?string $value = null)
    {
    }

    public function apply($model): Builder
    {
        $value = $this->value;

        $attributes = $this->attributes;

        return $model->when($this->value, function ($query) use ($value, $attributes) {
            $query->where(function ($query) use ($value, $attributes) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->orWhere(DB::raw("lower($attribute)"), 'like', '%'.strtolower($value).'%');
                }
            });
        });
    }
}
