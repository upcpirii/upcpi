<?php

namespace UPCEngineering\Overrides\Spatie\Permission\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use UsesTenantConnection;
}
