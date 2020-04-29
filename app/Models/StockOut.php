<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    protected $table = 'stocks_out';
    protected $primaryKey = 'id';
    public $timestamps = ['created_at'];

    protected $fillable = [
        'sku', 'qtde'
    ];
}
