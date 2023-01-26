<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Definir puerta de acceso, primer parámetro nombre del gate, segundo función con usuario actualmente autenticado
        Gate::define('EditPost', function($user, $post){

            // Retorna un boolean, true da acceso, false deniega acceso
            return $user->email === $post->user->email;
        });
    }
}
