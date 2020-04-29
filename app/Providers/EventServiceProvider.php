<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\OrderPost;

use App\Listeners\Cart\CartAdd;
use App\Listeners\Cart\CartUpdate;
use App\Listeners\Cart\CartDelete;
use App\Listeners\Cart\CartDestroy;
use App\Listeners\SendEmailOrderStore;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderStore::class => [
            SendEmailOrderStore::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen('cart.added', CartAdd::class);
        Event::listen('cart.updated', CartUpdate::class);
        Event::listen('cart.removed', CartDelete::class);
        Event::listen('cart.destroyed', CartDestroy::class);
    }
}
