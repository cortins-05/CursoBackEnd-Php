@include('includes.header')

<!--IMPRIMIR POR PANTALLA-->
<h1>{{ $titulo }}</h1>
<h2>{{ $listado[2] }}</h2>
<p>{{ date('Y') }}</p>

<!--COMENTARIOS-->
<!--Esto es un comentario html-->
<?php
//Esto es un comentario php
?>

{{-- Esto es un comentario blade--}}

<!--MOSTRAR SI EXISTE-->
<?= isset($director) ? $director : 'No hay director <br>';?>
{{ $director ?? 'No hay ningun director' }}

<!--CONDICIONALES-->
@if ($titulo && count($listado)>=5)
    <h1>El titulo existe y es este: {{ $titulo }}</h1>
@elseif($titulo)
    <h1>El titulo existe y el listado no es mayor a 5</h1>
@else
    <h1>La condicion no se ha cumplido</h1>
@endif

<!--BUCLES-->

@for($i=0;$i<=20;$i++)
    <p>El numero es: {{ $i }}</p>
@endfor

<hr><hr>

<?php $contador=1 ?>
@while ($contador<50)
    @if($contador%2==0)
        <p>Numero par: {{ $contador }}</p>
    @endif
    <?php $contador++ ?>
@endwhile

<hr><hr>

@foreach ($listado as $pelicula )
    <p>{{ $pelicula }}</p>
@endforeach


@include('includes.footer')