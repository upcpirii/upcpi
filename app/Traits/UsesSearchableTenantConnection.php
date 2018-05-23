<?php

namespace UPCEngineering\Traits;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Laravel\Scout\Searchable;

trait UsesSearchableTenantConnection
{
    use Searchable, UsesTenantConnection;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        $prefix = $this->getConnection()->getDatabaseName();

        $index = [$prefix, $this->table, 'index'];

        return implode('_', $index);
    }
}
