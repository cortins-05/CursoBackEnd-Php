<h1>Listado de frutas</h1>
<h3><a href="{{ route('fruta.create') }}">Crear fruta</a></h3>

@if(session('status'))
    <p style="background-color: green;color:white;">
        {{ session('status') }}
    </p>
@endif

<ul>
    @foreach ($frutas as $fruta)
        <li>
            <a href="{{ route('fruta.detail', ['id' => $fruta->id]) }}">
            {{ $fruta->nombre }}
            </a>
        </li>
    @endforeach
</ul>