<?php

namespace UPCEngineering\Overrides\Spatie\Permission\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use UsesTenantConnection;
}
