<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Category;
use App\Policies\CategoryPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',

        // 'App\Category' => 'App\Policies\CategoryPolicy',
        // \App\Category::class => \App\Policies\CategoryPolicy::class,
        // Category::class => CategoryPolicy::class, // v5.8.* + Policy Auto-Discovery. Any policies that are explicitly mapped in your AuthServiceProvider will take precedence over any potential auto-discovered policies.
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
