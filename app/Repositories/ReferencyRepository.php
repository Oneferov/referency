<?php

namespace App\Repositories;

use App\Models\Referency;
use Spatie\QueryBuilder\QueryBuilder;

class ReferencyRepository extends AbstractRepository 
{
    public function getModelClass(): string
    {
        return Referency::class;
    }

    public function getAllParents()
    {
        return QueryBuilder::for(Referency::class)
            ->whereNull('parent_id')
            ->allowedIncludes(['children'])
            ->allowedFilters('name', 'email', 'children.name')
            ->orderBy('sort')
            ->get();
    }
}
