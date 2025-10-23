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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

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
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" >
                        <div class="card">
                            <div class="card-header">Editar mi imagen</div>
                            <div class="card-body">
                                <form action="{{ route('image.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                                    <div class="form-group row">
                                        <label for="image_path" class="col-md-4 col-form-label text-md-right">Imagen</label>
                                        <div class="col-md-7">
                                            @if ($image->image_path)
                                                <img src="{{ route('image.file',['filename'=>$image->image_path]) }}" alt="">
                                            @endif
                                            <input type="file" name="image_path" class="form-control" required>

                                            @if($errors->has('image_path'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('image_path') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                                        <div class="col-md-7">
                                            <textarea id="description" name="description" class="form-control" required>{{ $image->description }}</textarea>

                                            @if($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <input type="submit" class="btn btn-primary" value="Actualizar imagen">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>