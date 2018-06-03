<?php

namespace UPCEngineering\Eloquent;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSetting extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'user_id',
        'key',
        'value',
    ];
}
