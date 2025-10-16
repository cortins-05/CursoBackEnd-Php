@if(isset($fruta)&&is_object($fruta))
    <h1>Editar fruta</h1>
@else
    <h1>Crear una fruta</h1>
@endif

<form action="{{ isset($fruta) ? route('fruta.update') : route('fruta.save') }}" method="post">
    {{ csrf_field() }}

    @if(isset($fruta)&&is_object($fruta))
        <input type="hidden" name="id" value="{{ $fruta->id }}">
    @endif

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{ $fruta->nombre or '' }}">

    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" value="{{ $fruta->descripcion or '' }}">

    <label for="precio">Precio</label>
    <input type="number" name="precio" value="{{ $fruta->precio or '' }}">

    <input type="submit" value="Guardar">
</form>