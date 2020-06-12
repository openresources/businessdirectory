<?php

namespace App;

use App\Business;
use App\Common\Enums\Roles;
use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasAdminRole()
    {
        return $this->role && (
            $this->role_id == Roles::ADMIN || $this->role_id == Roles::SUPER_ADMIN
        );
    }
}
