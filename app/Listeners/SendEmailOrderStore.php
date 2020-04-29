<?php

namespace App\Listeners;

use App\Events\OrderStore;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailOrderStore
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderStore  $event
     * @return void
     */
    public function handle(OrderStore $event)
    {
        
    }
}
