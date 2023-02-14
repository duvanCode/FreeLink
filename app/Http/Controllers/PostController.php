<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Foto;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('auth');
        $this->middleware('mypost')->only('edit');
        $this->middleware('mypost')->only('destroy');
    }
    public function index()
    {
        //
        $user = Auth::User();
        $posts = Post::where('user_id',$user->id)->get();
        return view('posts.user.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.user.createposts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion de formulario
        $request->validate([
            'title' => 'required|max:40',
            'link' => 'required|active_url',
            'contenido' => 'required|max:255',
            'foto_archivo' => 'required|mimes:jpg,bmp,png|max:2048',
        ]);


        //crear array asociativo donde se guarde todo lo de el formulario
        $post = $request->all();
        //rescatar las propiedades del usuario en la variable user
        $user = Auth::User();
        //reescribir el valor id del usuario
        $post['user_id'] = $user->id ;
        if($archivo = $request->file('foto_archivo'))
        {
            $nombre = $archivo->getClientOriginalName();
            if(Foto::where('foto_ruta',$nombre)->count()>0)
            {
                $fecha = getdate();
                $nombre = $fecha['hours'].'_'.$fecha['minutes'].'_'.$fecha['seconds'].'_'.$nombre;
                $archivo->move('img',$nombre);
            }
            else{
             $archivo->move('img',$nombre);
             }
             $fotoId = Foto::create(['foto_ruta'=>$nombre]);
             $post['foto_id'] = $fotoId->id;
            
        }
        else
        {
            $post['foto_id'] = 68;
        }

        //crear la publicacion
        Post::create($post);
        return redirect('/user/post');
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
        $request->session()->flash('id_post', $id);
        $posts = Post::where('id',$id)->get();
        return view('posts.user.posts',compact('posts'));
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
        $posts = Post::findOrFail($id);
        return view('posts.user.editposts',compact('posts'));
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
        //validacion de formulario
        $request->validate([
            'title' => 'required|max:40',
            'link' => 'required|active_url',
            'contenido' => 'required|max:255',
            'foto_id' => 'mimes:jpg,bmp,png|max:2048',
        ]);

        //se llama al usuario a editar con su id
        $post = Post::findOrFail($id);
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
           $post->foto->id = $fotoId->id;
        }

        //se hace la actualizacion del reguistro con los datos rescatado de request
        Post::find($id)->update(['title'=>$request->title,'link'=>$request->link,'contenido'=>$request->contenido,'foto_id'=>$post->foto->id]);
        //se redirecciona para mostrar los cambios
        return redirect('/user/post');
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

        $post = Post::findOrFail($id);

        $post->delete();

        Session::flash('destroySusses', 'Post Eliminado Exitosamente');

        $user = Auth::User();
        $posts = Post::where('user_id',$user->id)->get();
        return view('posts.user.index',compact('posts'));
    }
}
