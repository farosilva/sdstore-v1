<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'orders_item';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_id', 'sku', 'item', 'quantity', 'price_orig', 'price_sale', 'subtotal',
        'discount', 'taxes',
    ];

    protected $casts = [
        'quantity'      => 'integer',
        'price_orig'    => 'float',
        'price_sale'    => 'float',
        'subtotal'      => 'float',
        'discount'      => 'float',
        'taxes'         => 'float',
    ];

    //Relacionamento
    public function product()
    {
        return $this->hasOne('App\Models\ProductVariant', 'sku', 'sku');
    }
}
