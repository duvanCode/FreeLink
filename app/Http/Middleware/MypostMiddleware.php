<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Post;

class MypostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::User();
         $post = new Post();
        if(Auth::User()){
       if($user->role->rolDeUsuario == 'Administrador' || $user->id == $post->findOrFail(session('id_post'))->user->id) 
       {
            return $next($request);
       }
   }
        Session::flash('AccessD', 'Acceso Denegado');
        return redirect('/');
    }
}
