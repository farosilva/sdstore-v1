<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name', 'status',
    ];

    //Relacionamentos
    public function products()
    {
        return $this->hasManyThrough('App\Models\ProductVariant', 'App\Models\Subcategory', 'category_id', 'subcategory_id','category_id','subcategory_id');
    }
}
