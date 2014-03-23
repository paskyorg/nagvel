@extends('layouts.master')

@section('content')

<a class="btn btn-small btn-success pull-right" href="{{ URL::to('services/create') }}">Create New Service</a>

<h1>All the Services</h1>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Host</th>
            <th>Service</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->host->host_name }}</td>
            <td>{{ $service->service_description }}</td>
            <td>
                {{ Form::open(array('url' => 'services/' . $service->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete this Service', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
                <a class="btn btn-small btn-info" href="{{ URL::to('services/' . $service->id) }}">Show this Service</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop