@extends('layouts.master')

@section('content')

<h1>Poderes</h1>
<p class="lead">Lista de poderes. <a href="{{ route('poders.create') }}">Crear un nuevo poder</a></p>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Poderante</th>
        <th>Dni</th>
        <th>Demandado</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($poders as $poder)
      <tr>
        <td>{{ $poder->poderante }}</td>
        <td>{{ $poder->dni }}</td>
        <td>{{ $poder->demandado}} y/o {{ $poder->aseguradora}}</td>
        <td>
            <a href="{{ route('poders.show', $poder->id) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('poders.edit', $poder->id) }}" class="btn btn-primary">Editar</a>
            <a href="{{ route('poders.download', $poder->id) }}" class="btn btn-success" target="_blank">Descargar</a>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>
@stop