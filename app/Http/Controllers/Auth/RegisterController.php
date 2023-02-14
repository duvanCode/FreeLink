<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
    //comprobar si existe la foto en el array data
if (array_key_exists('foto_archivo',$data)) {
    //asignar la foto como archivo a una varible
        $archivo = $data['foto_archivo'];
        //obtener el nombre original del archivo y asignarlo a una variable
            $nombre = $archivo->getClientOriginalName();
            //verificar si una foto con ese nombre ya existe en la base de datos
            if(Foto::where('foto_ruta',$nombre)->count()>0)
            {
                //entonces se le asigna un nuevo nombre
                $fecha = getdate();
                $nombre = $fecha['hours'].'_'.$fecha['minutes'].'_'.$fecha['seconds'].'_'.$nombre;
                //se mueve el archivo a una carpeta del servidor
                $archivo->move('img',$nombre);
            }
            else{
                //se mueve a una carpeta del servidor
             $archivo->move('img',$nombre);
             }
             //se crea la ruta de la foto y se almacena ese registro en una variable
             $fotoId = Foto::create(['foto_ruta'=>$nombre]);
             //se le extrae la propiedad id que equivale al id del registro y se le asigna a una variable
             $foto = $fotoId->id;
            
        }
        else
        {
            //si no hay foto se le agrega una por defecto
            $foto = 109;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'=>3,
            'foto_id'=>$foto,
        ]);
    
}
}
