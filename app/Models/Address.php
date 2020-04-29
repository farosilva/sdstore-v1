<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $primaryKey = 'user_id';
    protected $table = 'address';

    protected $fillable = [
        'user_id', 'address_id', 'address_name', 'street_name', 'number', 'complem',
        'district', 'city', 'state', 'city_code', 'post_code', 'status',
        // 'user_id', 'address_id', 'address_name', 'street_name', 'number', 'complem',
        // 'district', 'city', 'state', 'city_code', 'post_code', 'for_invoice', 'for_delivery', 'status',
    ];

    protected $casts = [
        // 'for_invoice' => 'boolean',
        // 'for_delivery' => 'boolean',
        'created_at'  => 'datetime:d/m/Y H:i:s',
        'updated_at'  => 'datetime:d/m/Y H:i:s',
    ];

    // Atributos
    public function getPostCodeAttribute($value)
    {
        return str_pad($value, 8, 0, STR_PAD_LEFT);
    }
}
