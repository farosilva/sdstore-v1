<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $primaryKey = 'subcategory_id';

    protected $fillable = [
        'category_id', 'name', 'status',
    ];

    // Relacionamentos
    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'category_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'subcategory_id', 'subcategory_id');
    }
}
