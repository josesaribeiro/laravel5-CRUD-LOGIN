@extends('layouts.master')

@section('content')

<h1>Editing "{{ $document->company }}"</h1>
<p class="lead">Edit and save this document below, or <a href="{{ route('documents.index') }}">go back to all Documents.</a></p>
<hr>

@include('partials.alerts.errors')

{!! Form::model($document, [
    'method' => 'PATCH',
    'route' => ['documents.update', $document->id]
]) !!}

<div class="form-group">
    {!! Form::label('company', 'Company:', ['class' => 'control-label']) !!}
    {!! Form::text('company', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('owner', 'Owner:', ['class' => 'control-label']) !!}
    {!! Form::text('owner', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update document', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop