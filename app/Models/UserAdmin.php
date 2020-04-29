<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserAdmin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $table = 'users_admin';
    protected $primaryKey = 'user_id';


    protected $fillable = [
        'full_name', 'short_name', 'email', 'password', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'  => 'datetim:ed/m/Y H:i:s',
        'updated_at'  => 'datetime:d/m/Y H:i:s',
    ];

    // Atributos

    // Relacionamentos

    // Escopo
    public function scopeActive($query)
    {
        return $query->where('status', 'A');
    }
}
