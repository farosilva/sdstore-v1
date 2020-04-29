<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laracasts\Presenter\PresentableTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use PresentableTrait;

    protected $presenter = 'UserPresenter';

    protected $primaryKey = 'user_id';

    protected $appends = [
        'infos', 'verified'
    ];

    protected $fillable = [
        'full_name', 'short_name', 'email', 'type', 'cpf_cnpj', 'password', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token', 'infos_natural'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'  => 'datetime:d/m/Y H:i:s',
        'updated_at'  => 'datetime:d/m/Y H:i:s',
    ];

    // Atributos
    public function getInfosAttribute()
    {
        return $this->infos_natural;
    }
    public function getVerifiedAttribute()
    {
        return (is_null($this->email_verified_at)) ? false : true;
    }

    // Relacionamentos
    public function infos_natural()
    {
        return $this->hasOne('App\Models\UserNatural', 'user_id');
    }
    public function addresses()
    {
        return $this->hasMany('App\Models\Address', 'user_id');
    }
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact', 'user_id');
    }
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'user_id');
    }

    // Escopo
    public function scopeActive($query)
    {
        return $query->where('status', 'A');
    }
}
