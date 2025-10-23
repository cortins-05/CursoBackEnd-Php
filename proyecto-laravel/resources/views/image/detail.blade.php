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
            <div class="flex flex-col gap-3">
                <div class="likes flex gap-3">
                <?php $user_like = false; ?>
                @foreach ($image->likes as $like)
                    @if ($like->user->id==Auth::id())
                        <?php $user_like = true; ?>
                    @endif
                @endforeach
                @if ($user_like)
                    <img src="{{ asset('img/heart-red.png') }}" class="btn-like" data-id="{{$image->id}}" style="height: 46px; width: 50px;" alt="">
                @else
                    <img src="{{ asset('img/heart-black.png') }}" class="btn-dislike" data-id="{{$image->id}}" style="height: 46px; width: 50px;" alt="">
                @endif
                <span class="number_likes">{{ count($image->likes) }}</span>
                </div>

                @if(Auth::user()&&Auth::id()==$image->user_id)
                <div class="actions">
                    <a href="{{ route('image.edit',['id'=>$image->id]) }}" class="btn btn-primary">Actualizar</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Borrar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar imagen?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Si eliminas esta imagen nunca podras recuperarla, estas seguro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <a href="{{ route('image.delete',['id'=>$image->id]) }}" class="btn btn-sm btn-danger">Borrar definitivamente</a>
                        </div>
                        </div>
                    </div>
                </div>
                
                </div>
                @endif


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
