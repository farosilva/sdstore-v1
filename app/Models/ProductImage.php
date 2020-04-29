<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'products_image';
    protected $primaryKey = 'sku';

    protected $fillable = [
        'sku','id_image', 'directory'
    ];
}
