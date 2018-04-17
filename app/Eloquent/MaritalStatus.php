<?php

namespace UPCEngineering\Eloquent;

use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaritalStatus extends Model
{
    use SoftDeletes, UsesSystemConnection;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marital_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name',
    ];
}
