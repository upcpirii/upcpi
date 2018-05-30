<?php

namespace UPCEngineering\Eloquent;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use UPCEngineering\Eloquent\Concerns\HasNameAttribute;

class User extends Authenticatable
{
    use HasNameAttribute, HasRoles, Notifiable, SoftDeletes, UsesTenantConnection;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['last_login_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function member()
    {
        return $this->hasOne(Member::class);
    }
}
