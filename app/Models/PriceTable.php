<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceTable extends Model
{
    protected $table = 'prices_table';
    protected $primaryKey = 'table_id';

    protected $fillable = [
        'name', 'status',
    ];
}
