<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_id', 'user_id', 'address_id', 'invoice_id', 'order_ref', 'order_date',
        'delivery_date', 'payment_id', 'value', 'shipping', 'discount', 'taxes', 'ip_address', 'comments', 'status',
    ];

    protected $casts = [
        'value'         => 'float',
        'shipping'      => 'float',
        'discount'      => 'float',
        'taxes'         => 'float',
        'order_date'    => 'date:d/m/Y',
        'delivery_date' => 'date:d/m/Y',
        'created_at'    => 'datetime:d/m/Y H:i:s',
        'updated_at'    => 'datetime:d/m/Y H:i:s',
    ];

    // Atributos
    public function getTotalAttribute()
    {
        return (float)($this->value + $this->shipping + $this->taxes) - $this->discount;
    }

    public function getStatusLabelAttribute()
    {
        switch($this->status){
            case 'A':
                return 'Aberto';
                break;
            case 'P':
                return 'Pendente';
                break;
            case 'F':
                return 'Finalizado';
                break;
            case 'C':
                return 'Cancelado';
                break;
        }
    }

    // Relacionamentos
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function items()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id', 'order_id');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Payment', 'payment_id', 'payment_id');
    }

    public function delivery_address()
    {
        return $this->hasOne('App\Models\Address', 'address_id', 'address_id');
    }

    public function invoice_address()
    {
        return $this->hasOne('App\Models\Address', 'address_id', 'invoice_id');
    }
}
