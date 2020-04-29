<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $appends = [
        'content', 'cart', 'products'
    ];

    protected $hidden = [
        'content', 'cart', 'products'
    ];

    //Atributos
    public function getContentAttribute()
    {
        return getPayload($this->payload);
    }

    public function getCartAttribute()
    {
        return ($this->content['cart']['default']) ?? null;
    }

    public function getProductsAttribute()
    {
        if(is_null($this->cart)){
            return [];
        }else{
            $sku = collect($this->cart->pluck('id'));
            $qty = collect($this->cart->pluck('qty'));

            for($i = 0; $i < count($sku); $i++){
                $result[$sku[$i]] = $qty[$i];
            }

            return ($result) ?? null;
        }
    }

}
