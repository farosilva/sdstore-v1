<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveScope;

class ProductVariant extends Model
{
    public $increments = false;

    protected $primaryKey = 'sku';
    protected $keyType = 'string';
    protected $table = 'products_variant';

    protected $fillable = [
        'product_id', 'sku', 'technical_description', 'marketing_description',
        'subcategory_id', 'status'
    ];

    protected $appends = [
        // 'name', 'qtde_pack_label', 'current_price', 'category_name', 'subcategory_name',
        // 'weight_by_unit', 'promotion', 'stock', 'image', 'info', 'package'
    ];

    protected $hidden = [
        // 'products', 'images', 'infos', 'prices', 'stocks', 'subcategories', 'created_at',
        // 'updated_at'
    ];

    //Atributos
    public function getNameAttribute()
    {
        return $this->products->name;
    }

    public function getNameAltAttribute()
    {
        return $this->products->name.' '.($this->infos->weight/(($this->infos->qtde_pack == 0) ? 1 : $this->infos->qtde_pack)).$this->infos->unit;
    }

    public function getNameLinkAttribute()
    {
        return $this->sku.'-'.str_replace(' ','-',mb_strtolower(retiraAcentos(utf8_decode($this->name))));
    }

    public function getDefaultImageAttribute()
    {
        return $this->images->first()->directory;
    }

    public function getPackageLabelAttribute()
    {
        if($this->infos->qtde_pack > 0){
            return $this->infos->packages->name_alt.' c/ '.$this->infos->qtde_pack.'un';
        }else{
            return $this->infos->packages->name_alt.' c/ '.$this->infos->weight.$this->infos->unit;
        }
    }

    public function getCurrentPriceAttribute()
    {
        return $this->prices->where('start_date', '<=', now())->last()->price;
    }

    public function getSubcategoryNameAttribute()
    {
        return $this->subcategories->name;
    }

    public function getCategoryNameAttribute()
    {
        return $this->subcategories->categories ->name;
    }

    public function getWeightByUnitAttribute()
    {
        if($this->infos->qtde_pack > 0){
            return (int)($this->infos->weight / $this->infos->qtde_pack).$this->infos->unit.'*';
        }else{
            return 'N/I';
        }
    }










    // public function getQtdePackLabelAttribute()
    // {
    //     if($this->info['qtde_pack'] > 0){
    //         return $this->package['name_alt'].' c/ '.$this->info['qtde_pack'].'un';
    //     }else{
    //         return $this->package['name_alt'].' c/ '.$this->weight_custom;
    //     }
    // }

    // public function getWeightCustomAttribute()
    // {
    //     $weight = $this->info['weight'];

    //     switch($this->info['unit']){
    //         case 'g':
    //             if($weight >= 1000){
    //                 return str_replace('.', ',',(float)($weight/1000)).'kg';
    //             }else{
    //                 return $weight.'g';
    //             }
    //         break;
    //         case 'ml':
    //             if($weight >= 1000){
    //                 return str_replace('.', ',',(float)($weight/1000)).'l';
    //             }else{
    //                 return $weight.'ml';
    //             }
    //         break;
    //         default:
    //             return $weight.$this->info['unit'];
    //         break;
    //     }
    // }

    // public function getImageAttribute()
    // {
    //     return $this->images->pluck('directory');
    // }

    // public function getInfoAttribute()
    // {
    //     return $this->infos->only(['qtde_pack', 'weight', 'unit', 'minimal_stock', 'featured']);
    // }

    // public function getPackageAttribute()
    // {
    //     return $this->infos->packages->only(['prefix','name','name_alt','weight']);
    // }

    // public function getCurrentPriceAttribute()
    // {
    //     return $this->prices->where('start_date', '<=', now())->last()->price;
    // }

    // public function getStockAttribute()
    // {
    //     return collect([
    //         'avaiable'  => ($this->stocks->quantity > 0) ? true : false,
    //         'quantity'  => $this->stocks->quantity,
    //     ]);
    // }

    // public function getSubcategoryNameAttribute()
    // {
    //     return $this->subcategories->name;
    // }

    // public function getCategoryNameAttribute()
    // {
    //     return $this->subcategories->categories ->name;
    // }

    // public function getWeightByUnitAttribute()
    // {
    //     if($this['info']['qtde_pack'] > 0){
    //         return (int)($this['info']['weight']/$this['info']['qtde_pack']).$this['info']['unit'];
    //     }else{
    //         return 'N/I';
    //     }
    // }

    // public function getPromotionAttribute()
    // {
    //     return null;
    // }






    // //Relacionamentos
    public function products()
    {
        return $this->hasOne('App\Models\Product', 'product_id', 'product_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage', 'sku');
    }

    public function infos()
    {
        return $this->hasOne('App\Models\ProductAttribute', 'sku');
    }

    public function prices()
    {
        return $this->hasMany('App\Models\ProductPrice', 'sku', 'sku');
    }

    public function stocks()
    {
        return $this->hasOne('App\Models\Stock', 'sku', 'sku');
    }

    public function subcategories()
    {
        return $this->hasOne('App\Models\Subcategory', 'subcategory_id', 'subcategory_id');
    }

    //Escopos
    public function scopeActive($query)
    {
        return $query->whereHas('products', function($q){
            $q->active();
        })->where('status', 'A');
    }

    public function scopeFeatured($query)
    {
        return $query->whereHas('infos', function($q){
            $q->where('featured', 1);
        })->active();
    }
}
