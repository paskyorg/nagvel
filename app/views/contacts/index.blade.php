@extends('layouts.master')

@section('content')

<a class="btn btn-small btn-success pull-right" href="{{ URL::to('contacts/create') }}">Create New Contact</a>

<h1>All the Contacts</h1>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->contact_name }}</td>
            <td>
                {{ Form::open(array('url' => 'contacts/' . $contact->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete this Contact', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
                <a class="btn btn-small btn-info" href="{{ URL::to('contacts/' . $contact->id) }}">Show this Contact</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop