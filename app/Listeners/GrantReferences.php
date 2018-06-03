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

namespace UPCEngineering\Listeners;

use Hyn\Tenancy\Events\Database\Created;
use Illuminate\Support\Facades\DB;

class GrantReferences
{
    protected $tables = ['marital_statuses'];

    /**
     * Handle the event.
     *
     * @param Created $event
     *
     * @return void
     */
    public function handle(Created $event)
    {
        $config = $event->config;

        $database = config('database.connections.system.database');

        foreach ($this->tables as $table) {
            DB::statement("GRANT REFERENCES ON `{$database}`.`{$table}` TO `{$config['username']}`@'{$config['host']}' IDENTIFIED BY '{$config['password']}'");
        }
    }
}
