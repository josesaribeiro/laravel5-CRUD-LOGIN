@extends('layouts.master')

@section('content')

<p class="lead">{{ $poder->fecha }}</p>
<h1>{{ $poder->poderante }}</h1>
<p class="lead">{{ $poder->dni }}</p>
<hr>
<p class="lead">{{ $poder->direccion }}</p>
<p class="lead">{{ $poder->localidad }}</p>
<hr>
<p class="lead">{{ $poder->demandado }}</p>
<p class="lead">{{ $poder->aseguradora }}</p>
<p class="lead">{{ $poder->fecha_siniestro }}</p>
<p class="lead">{{ $poder->dominio_siniestro }}</p>
<p class="lead">{{ $poder->direccion_siniestro }}</p>
<p class="lead">{{ $poder->localidad_siniestro }}</p>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('poders.index') }}" class="btn btn-info">Volver a la lista de poderes</a>
        <a href="{{ route('poders.edit', $poder->id) }}" class="btn btn-primary">Editar poder</a>
    </div>
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['poders.destroy', $poder->id]
        ]) !!}
            {!! Form::submit('Eliminar poder?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>

@stop