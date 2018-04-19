<?php

namespace UPCEngineering\Console\Scout;

use Hyn\Tenancy\Traits\MutatesMigrationCommands;
use Illuminate\Contracts\Events\Dispatcher;
use Laravel\Scout\Console\ImportCommand as BaseCommand;
use UPCEngineering\Traits\MutatesCommands;

class ImportCommand extends BaseCommand
{
    use MutatesCommands;
}
