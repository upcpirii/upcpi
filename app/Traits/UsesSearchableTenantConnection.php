<?php

namespace UPCEngineering\Traits;

use Hyn\Tenancy\Environment;
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
        return 'members_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

    /**
     * Get the value used to index the model.
     *
     * @return mixed
     */
    public function getScoutKey()
    {
        return $this->uuid;
    }
}
