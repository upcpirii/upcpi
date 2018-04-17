<?php
/**
 * Created by PhpStorm.
 * User: b8
 * Date: 12/04/2018
 * Time: 03:20
 */

namespace UPCEngineering\Eloquent;


use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes, UsesTenantConnection;
}
