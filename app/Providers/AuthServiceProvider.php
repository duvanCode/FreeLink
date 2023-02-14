<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
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

        //
          Auth::viaRequest('query', function (Request $request) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...
            $usuario = Auth::User();
            if($usuario){
            if($usuario->role_id == 1){
            return $usuario->role_id;
            }
            }
     });
          Auth::viaRequest('query2', function (Request $request) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...
            $usuario = Auth::User();
            $post = new Post();
            $post = $post->findOrFail(session('id_post'));
            if($usuario){
            if($usuario->role_id == 1 || $usuario->id == $post->user->id){
            return $usuario;
            }
            }
     });

    
    }
}
