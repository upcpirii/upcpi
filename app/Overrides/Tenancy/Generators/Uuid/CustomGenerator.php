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

namespace UPCEngineering\Overrides\Tenancy\Generators\Uuid;

use Hyn\Tenancy\Contracts\Website;
use Hyn\Tenancy\Contracts\Website\UuidGenerator;
use Ramsey\Uuid\Uuid;

class CustomGenerator implements UuidGenerator
{
    /**
     * @param Website $website
     *
     * @return string
     */
    public function generate(Website $website) : string
    {
        $uuid = substr(Uuid::uuid4()->toString(), 0, 16);

        return str_replace('-', null, $uuid);
    }
}
