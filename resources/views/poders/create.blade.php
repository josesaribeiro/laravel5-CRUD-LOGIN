@extends('layouts.master')

@section('content')

<h1>Crear un poder</h1>
<p class="lead">Ingrese los datos para generar un nuevo poder.</p>
<hr>

{!! Form::open([
    'route' => 'poders.store'
]) !!}

@include('partials.alerts.errors')

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

<script>
  $(function() {
    $("#datepicker_fecha").datepicker({ dateFormat: 'yy-mm-dd' });
    $("#datepicker_fecha_siniestro").datepicker({ dateFormat: 'yy-mm-dd' });
  });
 </script>
 
{!! Form::submit('Crear nuevo poder', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop