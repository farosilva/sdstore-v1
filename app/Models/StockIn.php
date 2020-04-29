<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    protected $table = 'stocks_in';
    protected $primaryKey = 'id';
    public $timestamps = ['created_at'];

    protected $fillable = [
        'sku', 'qtde'
    ];
}
