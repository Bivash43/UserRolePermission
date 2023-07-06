<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hasRole(int $roleId): bool
    {
        return $this->roles()->where('id', $roleId)->exists();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function checkPermission($permission)
    {
        $roles = auth()->user()->roles;
        $access = false;
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('name', $permission)) {
                $access = true;
            }
        }
        return $access;
    }
}
