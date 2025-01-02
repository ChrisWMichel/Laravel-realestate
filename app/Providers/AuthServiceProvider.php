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
        //Gate::policy(Listing::class, ListingPolicy::class);
        //  Gate::define('update-listing', function (User $user, Listing $listing) {
        //     return $user->id === $listing->by_user_id;
        // });
    }
}
