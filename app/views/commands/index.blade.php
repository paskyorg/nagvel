@extends('layouts.master')

@section('content')

<a class="btn btn-small btn-success pull-right" href="{{ URL::to('commands/create') }}">Create New Command</a>

<h1>All the Commands</h1>

@if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
  <thead>
    <tr>
        <th>ID</th>
        <th>Command</th>
                <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($commands as $command)
    <tr>
        <td>{{ $command->id }}</td>
        <td>{{ $command->command_name }}</td>
        <td>
        {{ Form::open(array('url' => 'commands/' . $command->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete this Command', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
                <a class="btn btn-small btn-info" href="{{ URL::to('commands/' . $command->id) }}">Show this Command</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop