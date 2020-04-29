<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveScope;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_id', 'name', 'status'
    ];

    // Relacionamentos
    public function variants()
    {
        return $this->hasMany('App\Models\ProductVariant', 'product_id', 'product_id');
    }

    // Escopo
    public function scopeActive($query)
    {
        return $query->where('status', 'A');
    }

}
