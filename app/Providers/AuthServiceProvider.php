<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::resource('category','App\Policies\CategoryPolicy');
        Gate::resource('client','App\Policies\ClientPolicy');
        Gate::resource('contact','App\Policies\ContactPolicy');
        Gate::resource('dashboard','App\Policies\DashboardPolicy');
        Gate::resource('make','App\Policies\MakePolicy');
        Gate::resource('message','App\Policies\MessagePolicy');
        Gate::resource('model','App\Policies\ModelPolicy');
        Gate::resource('newsletter','App\Policies\NewsletterPolicy');
        Gate::resource('product','App\Policies\ProductPolicy');
        Gate::resource('roles','App\Policies\RolePolicy');
        Gate::resource('setting','App\Policies\SettingPolicy');
        Gate::resource('sub_category','App\Policies\SubCategoryPolicy');
        Gate::resource('testimonial','App\Policies\TestimonialPolicy');
        Gate::resource('users','App\Policies\UserPolicy');
    }
}
