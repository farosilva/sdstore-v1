<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $primaryKey = 'sku';
    protected $table = 'products_attribute';

    protected $fillable = [
        'sku', 'pack_id', 'qtde_pack', 'weight', 'unit', 'minimal_stock', 'featured'
    ];

    protected $casts = [
        'qtde_pack' => 'float',
        'weight' => 'float',
        'minimal_stock' => 'integer',
        'featured' => 'boolean',
    ];

    //Atributos
    public function getQtdePackAttribute($value)
    {
        return ($value > 0) ? (float)$value : 'N/I';
    }

    //Relacionamentos
    public function packages()
    {
        return $this->hasOne('App\Models\Package', 'pack_id', 'pack_id');
    }
}
