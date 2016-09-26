@extends('layouts.master')

@section('content')

<h1>{{ $poder->poderante }}</h1>
<h2>{{ $poder->demandado }}  Y/O {{ $poder->aseguradora }}</h2>

<p class="lead">Edite el poder, o <a href="{{ route('poders.index') }}">vuelva a la lista de poderes.</a></p>
<hr>

@include('partials.alerts.errors')

{!! Form::model($poder, [
    'method' => 'PATCH',
    'route' => ['poders.update', $poder->id]
]) !!}

<div class="form-group">
    {!! Form::label('fecha', 'Fecha:', ['class' => 'control-label']) !!}
    {!! Form::text('fecha', null, array('id' => 'datepicker_fecha', 'class' => 'form-control datepicker')) !!}
</div>

<div class="form-group">
    {!! Form::label('poderante', 'Poderante:', ['class' => 'control-label']) !!}
    {!! Form::text('poderante', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('dni', 'Dni:', ['class' => 'control-label']) !!}
    {!! Form::text('dni', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('localidad', 'Localidad:', ['class' => 'control-label']) !!}
    {!! Form::text('localidad', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('demandado', 'Demandado:', ['class' => 'control-label']) !!}
    {!! Form::text('demandado', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('aseguradora', 'Aseguradora:', ['class' => 'control-label']) !!}
    {!! Form::text('aseguradora', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('fecha_siniestro', 'Fecha siniestro:', ['class' => 'control-label']) !!}
    {!! Form::text('fecha_siniestro', null, array('id' => 'datepicker_fecha_siniestro', 'class' => 'form-control datepicker')) !!}
</div>

<div class="form-group">
    {!! Form::label('dominio_siniestro', 'Dominio:', ['class' => 'control-label']) !!}
    {!! Form::text('dominio_siniestro', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('direccion_siniestro', 'Lugar:', ['class' => 'control-label']) !!}
    {!! Form::text('direccion_siniestro', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('localidad_siniestro', 'Localidad:', ['class' => 'control-label']) !!}
    {!! Form::text('localidad_siniestro', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop