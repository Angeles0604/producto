<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'nick',
        'phone',
        'dni',
        'id_role',
        'profile_image',
        'estado'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function hasPermission($permissionName)
    {
        return $this->role->permissions->contains('permission_name', $permissionName);
    }

    // Especifica el campo de la contraseña para hashing
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isRole($roleName)
    {
        return $this->role && $this->role->role_name === $roleName;
    }

}



