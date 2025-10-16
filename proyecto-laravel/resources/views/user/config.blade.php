<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" >
                    <div>
                        <h1>Configuracion de mi cuenta</h1>
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" >
                        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="Auth::user()->name" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            
                            <!-- Surname -->
                            <div>
                                <x-input-label for="surname" :value="__('Surname')" />
                                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="Auth::user()->surname" required autofocus autocomplete="surname" />
                                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                            </div>
                            
                            <!-- Nick -->
                            <div>
                                <x-input-label for="nick" :value="__('Nick')" />
                                <x-text-input id="nick" class="block mt-1 w-full" type="text" name="nick" :value="Auth::user()->nick" required autofocus autocomplete="nick" />
                                <x-input-error :messages="$errors->get('nick')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="Auth::user()->email" required autocomplete="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <br>
                            
                            @include('includes.avatar')

                            <!-- Image_Path -->
                            <div class="mt-4">
                                <x-input-label for="image_path" :value="__('Imagen')" />
                                <input id="image_path" name="image_path" type="file" class="block mt-1 w-full">
                                <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ms-4">
                                    {{ __('Guardar cambios') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>