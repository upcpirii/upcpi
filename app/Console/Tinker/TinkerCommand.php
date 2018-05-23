<?php

namespace UPCEngineering\Console\Tinker;

use Laravel\Tinker\Console\TinkerCommand as BaseCommand;
use UPCEngineering\Traits\MutatesTinkerCommand;

class TinkerCommand extends BaseCommand
{
    use MutatesTinkerCommand;
}
