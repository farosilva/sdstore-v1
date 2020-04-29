<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'transaction_code', 'transaction_date', 'payment_type', 'order_ref'
    ];

    protected $casts = [
        'transaction_date'  => 'datetime:d/m/Y H:i:s',
        'created_at'        => 'datetime:d/m/Y H:i:s',
        'updated_at'        => 'datetime:d/m/Y H:i:s',
    ];

    //Atributos
    public function getOrderIdAttribute()
    {
        return (int)preg_replace('/[^0-9]/','', $this->reference);
    }
    public function getPaymentLabelAttribute()
    {
        switch ($this->payment_type) {
            case '1':
            return 'Cartão de Crédito';
                break;
            case '2':
            return 'Boleto';
                break;
            
            default:
            return '';
                break;
        }
    }

    // Relacionamentos
    public function infos()
    {
        return $this->hasMany('App\Models\PaymentInfo', 'transaction_code', 'transaction_code')->orderBy('notification_date');
    }

    public function order()
    {
        return $this->hasOne('App\Models\Order', 'order_ref', 'order_ref');
    }

}
