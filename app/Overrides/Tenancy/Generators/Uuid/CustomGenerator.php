<?php

namespace UPCEngineering\Overrides\Tenancy\Generators\Uuid;

use Hyn\Tenancy\Contracts\Website\UuidGenerator;
use Hyn\Tenancy\Contracts\Website;
use Ramsey\Uuid\Uuid;

class CustomGenerator implements UuidGenerator
{
    /**
     * @param Website $website
     * @return string
     */
    public function generate(Website $website) : string
    {
        $uuid = substr(Uuid::uuid4()->toString(), 0, 16);

        return str_replace('-', null, $uuid);
    }
}
