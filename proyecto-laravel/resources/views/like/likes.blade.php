<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col gap-6 p-6 w-full">
        @foreach ($likes as $like)
            @include('includes.image',['image'=>$like->image])
        @endforeach

        <!-- Paginación centrada -->
        <div class="mt-4 flex justify-center">
            {{ $likes->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
