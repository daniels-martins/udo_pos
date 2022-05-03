<?php

namespace App\Providers;

use App\Events\RegisteredEmployee;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\CreateUserModelForNewEmployee;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RegisteredEmployee::class => [
            CreateUserModelForNewEmployee::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // class based registrations
        // Event::listen(
        //     PodcastProcessed::class,
        //     [SendPodcastNotification::class, 'handle']
        // );

        //    closure based registrations
        // Event::listen(function (PodcastProcessed $event) {
        //     //
        // });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
