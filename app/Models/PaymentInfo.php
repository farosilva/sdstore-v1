<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PaymentInfo extends Model
{
    use Notifiable;
    
    protected $table = 'payments_info';
    protected $primaryKey = 'transaction_code';
    protected $keyType = 'string';

    protected $fillable = [
        'transaction_code','notification_code', 'notification_date', 'payment_link', 'payment_validity', 'status', 
    ];

    protected $casts = [
        'notification_date' => 'datetime:d/m/Y H:i:s',
        'payment_validity'  => 'datetime:d/m/Y H:i:s',
        'created_at'        => 'datetime:d/m/Y H:i:s',
        'updated_at'        => 'datetime:d/m/Y H:i:s',
    ];

    //Atributos
    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 1:
            return 'Aguardando pagamento';
                break;
            case 2:
            return 'Em análise';
                break;
            case 3:
            return 'Pago';
                break;
            case 4:
            return 'Disponível';
                break;
            case 5:
            return 'Em disputa';
                break;
            case 6:
            return 'Devolvido';
                break;
            case 7:
            return 'Cancelado';
                break;
            case 8:
            return 'Debitado';
                break;
            case 9:
            return 'Retenção temporária';
                break;
                
            default:
            return '';
                break;
        }
        return ;
    }

    // Relacionamentos
    public function payment()
    {
        return $this->hasOne('App\Models\Payment', 'transaction_code', 'transaction_code');
    }
    
}
