<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $primaryKey = 'sku';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'sku', 'quantity', 'in_cart'
    ];

    protected $appends = [
        'quantity_avaiable', 'in_stock', 'avaiable', 'minimal_stock'
    ];

    protected $hidden = [
        'products'
    ];

    protected $casts = [
        'quantity'  => 'integer',
        'in_cart'   => 'integer',
        'avaiable'   => 'boolean',
    ];

    //Atributos
    public function getQuantityAvaiableAttribute()
    {
        return $this->quantity - $this->in_cart;
    }

    public function getInStockAttribute()
    {
        return ($this->quantity > 0) ? true : false;
    }

    public function getAvaiableAttribute()
    {
        return ($this->quantity_avaiable > 0) ? true : false;
    }

    public function getMinimalStockAttribute()
    {
        return ($this->quantity_avaiable > $this->products->infos->minimal_stock) ? false : true;
    }

    //Relacionamentos
    public function products()
    {
        return $this->belongsTo('App\Models\ProductVariant', 'sku', 'sku');
    }

}
