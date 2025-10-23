<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex gap-6 p-6 w-full border-b border-black ">
        @if($user->image)
            <img class="rounded-full" src="{{ route('user.avatar',['filename'=>$user->image]) }}" alt="">
            <div>
                <h1>{{ "@".$user->nick }}</h1>
                <br>
                <h2>{{ $user->name . ' ' . $user->surname }}</h2>
                <p>{{ 'Se unio: '. long_time_filter($user->created_at) }}</p>
            </div>
        @endif
    </div>

    <div class="flex flex-col gap-6 p-6 w-full">
        @foreach ($user->images as $image)
            @include('includes.image',['image'=>$image])
        @endforeach
    </div>
</x-app-layout>
