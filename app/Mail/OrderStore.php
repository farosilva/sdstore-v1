<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderStore extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $transaction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $transaction)
    {
        $this->order = $order;
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.orders.order-stored', ['order' => $this->order, 'transaction' => $this->transaction]);
    }
}
