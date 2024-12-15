<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthMethod extends Model
{
    use HasFactory;

    protected $table = 'auth_methods';
    protected $primaryKey = 'id_auth_method';
    protected $fillable = ['id_user', 'provider', 'provider_user_id', 'is_verified'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
