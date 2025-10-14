<h1>Listado de frutas</h1>

<ul>
    @foreach ($frutas as $fruta)
        <li>
            <a href="{{ route('fruta.detail', ['id' => $fruta->id]) }}">
            {{ $fruta->nombre }}
            </a>
        </li>
    @endforeach
</ul>