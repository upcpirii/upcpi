<?php

/*
 * This file is part of the UPCPI Software package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @version    alpha
 *
 * @author     Bertrand Kintanar <bertrand@imakintanar.com>
 * @license    BSD License (3-clause)
 * @copyright  (c) 2017-2018, UPC Engineering
 *
 * @link       https://bitbucket.org/bkintanar/upcpi
 */

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
