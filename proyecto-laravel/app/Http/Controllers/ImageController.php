<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Comment;
use App\Models\Like;

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

    public function delete($id){
        $user = Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id',$id)->get();
        $likes = Like::where('image_id',$id)->get();
        if($user&&$image->user->id==$user->id){
            if($comments&&count($comments)>=1){
                foreach($comments as $comment){
                    $comment->delete();
                }
            }
            if($likes&&count($likes)>=1){
                foreach($likes as $like){
                    $like->delete();
                }
            }
            Storage::disk('images')->delete($image->image_path);
            $image->delete();
            $message = array('message'=>'La imagen se ha borrado');
        }else{
            $message = array('message'=>'La imagen no se ha borrado');
        }
        return redirect(route('dashboard'))->with($message);
    }

    public function edit($id){
        $user = Auth::user();
        $image = Image::find($id);
        if($user&&$image&&$image->user->id==$user->id){
            return view('image.edit',['image'=>$image]);
        }else{
            return redirect()->route('dashboard');
        }
    }

    public function update(Request $request){
        
        $validate = $this->validate($request,[
            'description' =>'required',
            'image_path' => 'image'
        ]);
        
        $image_id = $request->input('image_id');
        $description = $request->input('description');
        $image_path = $request->file('image_path');

        $image = Image::find($image_id);
        $image->description=$description;

        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name,File::get($image_path));
            $image->image_path = $image_path_name;
        }

        $image->update();

        return redirect(route('image.detail',['id'=>$image_id]))->with(['message'=>'Image actualizada con exito']);

    }

}
