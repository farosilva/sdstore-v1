<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Mail\OrderStore;
use App\Models\Order;

class OrderStored extends Notification
{
    use Queueable;

    public $order;
    public $transaction;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order, $transaction)
    {
        $this->order = $order;
        $this->transaction = $transaction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $order = Order::find($this->order->order_id);

        return (new OrderStore($order, $this->transaction))
            ->to(auth()->user()->email)
            ->bcc(explode(',', env('APP_MAIL_ADMIN')))
            ->subject('Seu pedido foi criado!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
