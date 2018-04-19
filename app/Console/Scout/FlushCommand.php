<?php

namespace UPCEngineering\Console\Scout;

use Laravel\Scout\Console\FlushCommand as BaseCommand;
use UPCEngineering\Traits\MutatesScoutCommands;

class FlushCommand extends BaseCommand
{
    use MutatesScoutCommands;
}
