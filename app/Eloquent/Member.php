<?php

namespace UPCEngineering\Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use UPCEngineering\Eloquent\Concerns\HasNameAttribute;
use UPCEngineering\Traits\UsesSearchableTenantConnection;

class Member extends Authenticatable
{
    use HasNameAttribute, SoftDeletes, UsesSearchableTenantConnection;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'department_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'marital_status_id',
        'salutation',
        'nickname',
        'status',
        'date_of_birth',
        'personal_email',
        'home_phone',
        'mobile_phone',
    ];

    protected $appends = ['display_name', 'marital_status', 'department'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date_of_birth', 'deleted_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function getMaritalStatusAttribute()
    {
        $relation = $this->hasOne(MaritalStatus::class, 'id', 'marital_status_id')->first();

        return $this->attributes['marital_status'] = optional($relation)->name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     *
     * @author Bertrand Kintanar <bertrand.kintanar@gmail.com>
     */
    public function getDepartmentAttribute()
    {
        $relation = $this->hasOne(Department::class, 'id', 'department_id')->first();

        return $this->attributes['department'] = optional($relation)->name;
    }

    public function toSearchableArray()
    {
        return $this->toArray() + ['path' => route('member.show', $this)];
    }
}
