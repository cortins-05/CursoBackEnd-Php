<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Response as Response2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function config(){
        return view('user.config');
    }

    public function update(Request $request){
        //Conseguir usuario identificado
        $user = Auth::user();
        $id = Auth::id();

        //Validacion del formulario
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255',Rule::unique('users', 'nick')->ignore($id)],
            'email' => ['required', 'string', 'lowercase', Rule::unique('users','email')->ignore($id)]
        ]);

        //Recoger datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        //Asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        //Subir la imagen
        $image_path = $request->file('image_path');
        if($image_path){
            //Poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();

            //Guardar en la carpeta storage
            Storage::disk('users')->put($image_path_name,File::get($image_path));

            //Seteo el nombre de la imagen en el objeto
            $user->image = $image_path_name;
        }

        //Ejecutar consulta y cambios en la BD
        $user->update();

        return redirect()->route('config')
        ->with(['message'=>'Usuario actualizado correctamente']);
        
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response2($file,200);
    }
}
