<?php

namespace UPCEngineering\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Illuminate\Auth\Events\Login::class => [
            \UPCEngineering\Listeners\LogSuccessfulLogin::class,
        ],
        \Hyn\Tenancy\Events\Database\Created::class => [
            \UPCEngineering\Listeners\GrantReferences::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
