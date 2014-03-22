@extends('layouts.master')

@section('content')

<a class="btn btn-small btn-success pull-right" href="{{ URL::to('hosts/create') }}">Create New Host</a>

<h1>All the Hosts</h1>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Host</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hosts as $host)
        <tr>
            <td>{{ $host->id }}</td>
            <td>{{ $host->host_name }}</td>
            <td>
                {{ Form::open(array('url' => 'hosts/' . $host->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete this Host', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
                <a class="btn btn-small btn-info" href="{{ URL::to('hosts/' . $host->id) }}">Show this Host</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop