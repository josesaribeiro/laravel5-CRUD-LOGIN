@extends('layouts.master')

@section('content')

<h1>Add a New Document</h1>
<p class="lead">Add to your document list below.</p>
<hr>

{!! Form::open([
    'route' => 'documents.store'
]) !!}

@include('partials.alerts.errors')

<div class="form-group">
    {!! Form::label('company', 'Company:', ['class' => 'control-label']) !!}
    {!! Form::text('company', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('owner', 'Owner:', ['class' => 'control-label']) !!}
    {!! Form::text('owner', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create New Document', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop