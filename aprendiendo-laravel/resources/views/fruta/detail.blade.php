<h1>{{ $fruta->nombre }}</h1>
<p>
    {{ $fruta->descripcion }}
</p>

<a href="{{ route('fruta.delete',['id'=>$fruta->id]) }}">Eliminar</a>
<a href="{{ route('fruta.edit',['id'=>$fruta->id]) }}">Actualizar</a>