<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function checkRoles($roles) : bool {
        if (!is_array($roles)) {
            $roles = [$roles];
        }
        if (!$this->hasAnyRole($roles)) {
            auth()->logout();
            abort(404);
        }
    }

    public function hasAnyRole($roles) : bool {
        print_r($this->roles()->whereIn('name', $roles));
        return (bool) $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role) : bool {
        print_r($this->roles()->where('name', $role));
        return (bool) $this->roles()->where('name', $role)->first();
    }
}
