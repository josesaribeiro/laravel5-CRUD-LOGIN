@extends('layouts.master')

@section('content')

<h1>Documents List</h1>
<p class="lead">Here's a list of all your documents. <a href="{{ route('documents.create') }}">Add a new one?</a></p>
<hr>

@foreach($documents as $document)
    <h3>{{ $document->company }}</h3>
    <p>{{ $document->owner}}</p>
    <p>
        <a href="{{ route('documents.show', $document->id) }}" class="btn btn-info">View Document</a>
        <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-primary">Edit Document</a>
        <a href="{{ route('documents.download', $document->id) }}" class="btn btn-success">Download Document</a>
    </p>
    <hr>
@endforeach

@stop