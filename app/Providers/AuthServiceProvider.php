<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Listing;
use App\Policies\ListingPolicy;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Listing::class => ListingPolicy::class,
        'Illuminate\Notifications\DatabaseNotification' => 'App\Policies\NotificationPolicy'
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    }
}
