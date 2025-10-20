<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('image.create');
    }

    public function save(Request $request)
    {
        // ✅ Validación (puedes usar ->validate o $request->validate)
        $validated = $request->validate([
            'description' => 'required|string',
            'image_path'  => 'required|image'
        ]);

        // ✅ Recogemos los datos del formulario
        $description = $validated['description'];
        $image_file  = $request->file('image_path');

        // ✅ Creamos una nueva instancia del modelo
        $image = new Image();
        $image->user_id     = Auth::id(); // 🔥 Importante si hay relación usuario-imagen
        $image->description = $description;

        // ✅ Guardamos la imagen
        if ($image_file) {
            $image_name = time() . '_' . $image_file->getClientOriginalName();
            Storage::disk('images')->put($image_name, File::get($image_file));
            $image->image_path = $image_name;
        }

        // ✅ Guardamos el registro en la base de datos
        $image->save();

        // ✅ Redirigimos o mostramos mensaje
        return redirect()->route('dashboard')->with('message', 'Imagen subida correctamente.');
    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file,200);
    }

    public function detail($id){
        $image = Image::find($id);
        return view('image.detail',[
            'image' => $image
        ]);
    }
}
