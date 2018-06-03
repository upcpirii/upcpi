<?php

namespace UPCEngineering\Listeners;

use Hyn\Tenancy\Events\Database\Created;
use Illuminate\Support\Facades\DB;

class GrantReferences
{
    protected $tables = ['marital_statuses'];

    /**
     * Handle the event.
     *
     * @param  Created $event
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
