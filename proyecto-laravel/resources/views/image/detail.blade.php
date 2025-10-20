<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col gap-6 p-6 w-full">
        <div class="bg-white shadow rounded-lg p-5">
            <!-- Cabecera -->
            <div class="flex items-center gap-3 mb-4">
                @if($image->user->image)
                    <div class="w-8 h-8 rounded-full overflow-hidden">
                        <img src="{{ route('user.avatar',['filename'=>$image->user->image]) }}" 
                                class="w-full h-full object-cover" 
                                alt="{{ $image->user->nick }}">
                    </div>
                @endif
                <div>
                    <a href="{{ route('image.detail',['id'=>$image->id]) }}">
                        <p class="font-semibold text-gray-900">
                            {{ $image->user->name . ' ' . $image->user->surname }}
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ '@' . $image->user->nick }}
                        </p>
                    </a>
                </div>
            </div>

            @if(session('message'))
            <strong>{{ session('message') }}</strong>
            @endif

            <!-- Imagen -->
            <div class="flex items-center justify-center bg-gray-50 overflow-hidden rounded-lg max-h-[200px] mb-4">
                <img src="{{ route('image.file',['filename'=>$image->image_path]) }}" 
                        alt="Imagen"
                        class="max-h-[400px] w-auto object-contain block transform scale-75">
            </div>

            <!-- Descripción -->
            <div class="p-3 bg-gray-50 rounded-lg">
                <span class="font-semibold text-gray-800">{{ '@'.$image->user->nick }}</span>
                <span> || {{ long_time_filter($image->created_at) }}</span>
                <p class="text-gray-700">{{ $image->description }}</p>
            </div>

            <!--Comentarios y Likes-->
            <div class="flex flex-col gap-3 max-h-[40px]">
                <img src="{{ asset('img/heart-black.png') }}" style="height: 46px; width: 50px;" alt="">
                <h2>Comentarios {{ count($image->comments) }}</h2>
                <hr>
                <form action="{{ route('comment.save') }}" method="post" class="form">
                    @csrf
                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                    <p>
                        <textarea class="form-control" name="content" required></textarea>
                        @if($errors->has('content'))
                        <span class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                        @endif
                    </p>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>
            
            @foreach ($image->comments as $comment)
            <div class="p-3 bg-gray-50 rounded-lg">
                <span class="font-semibold text-gray-800">{{ '@'.$comment->user->nick }}</span>
                <span> || {{ long_time_filter($comment->created_at) }}</span>
                <p class="text-gray-700">{{ $comment->content }}</p>
                @if(Auth::check()&&($comment->user_id==Auth::id()||$comment->image->user_id==Auth::id()))
                <a href="{{ route('comment.delete',['id'=>$comment->id]) }}" class="btn btn-sm btn-danger">
                    Eliminar
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
