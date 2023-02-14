<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Foto;
use Illuminate\Validation\Rule;


class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
            $user = Auth::User();
            $posts = Post::where('user_id',$user->id)->get();
            return view('posts.user.profile',compact('user'),compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Auth::user();
        return view('posts.user.editperfil',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'email'=>['required', Rule::unique('users')->ignore($user->id)],
            'foto_id' =>'mimes:jpg,bmp,png|max:2048',
            
        ]);
        
        //se evalua si tiene un cambio en el archivo
        if($foto = $request->file('foto_id'))
        {
            //si tiene cambios entoneces se obtiene el nombre en una variable
            $nombre = $foto->getClientOriginalName();
            //se evalua si el nombre de esa foto ya existe en la base de datos
            if(Foto::where('foto_ruta',$nombre)->count()>0)
            {
                //en caso de que si se renombra la foto con su nombre y la fecha del momento en que se sube
                $fecha = getdate();
                $nombre = $fecha['hours'].'_'.$fecha['minutes'].'_'.$fecha['seconds'].'_'.$nombre;
                //se sube foto renombrada
                $foto->move('img',$nombre);
                
            }
            else{
                //en caso de que no se sube la foto con el nombre que tiene
                $foto->move('img',$nombre); 
           }
           //se crea un nuevo reguistro de la nueva foto y ademas se guarda en una variable 
           $fotoId = Foto::create(['foto_ruta'=>$nombre]);
           //se sobre escribe el valor de foto_id por el de el nuevo reguistro
           $user->foto->id = $fotoId->id;
        }

        //se hace la actualizacion del reguistro con los datos rescatado de request
        User::find($id)->update(['name'=>$request->name,'email'=>$request->email,'foto_id'=>$user->foto->id]);
        //se redirecciona para mostrar los cambios
        return redirect('/user/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    

}
