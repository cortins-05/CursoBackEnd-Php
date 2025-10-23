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
                        <a href="{{ route('user.profile',['id'=>$image->user->id]) }}">
                            <p class="font-semibold text-gray-900">
                                {{ $image->user->name . ' ' . $image->user->surname }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ '@' . $image->user->nick }}
                            </p>
                        </a>
                    </div>
                </div>

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
                    <a href="{{ route('image.detail',['id'=>$image->id]) }}">
                        <h2>Comentarios {{ count($image->comments) }}</h2>
                    </a>
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
</div>