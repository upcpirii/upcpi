<?php

namespace UPCEngineering\Console\Scout;

use Laravel\Scout\Console\ImportCommand as BaseCommand;
use UPCEngineering\Traits\MutatesScoutCommands;

class ImportCommand extends BaseCommand
{
    use MutatesScoutCommands;
}
