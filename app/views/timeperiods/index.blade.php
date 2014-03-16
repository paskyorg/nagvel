@extends('layouts.master')

@section('content')

<a class="btn btn-small btn-success pull-right" href="{{ URL::to('timeperiods/create') }}">Create New Timeperiod</a>

<h1>All the Timeperiods</h1>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Timeperiod</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($timeperiods as $timeperiod)
        <tr>
            <td>{{ $timeperiod->id }}</td>
            <td>{{ $timeperiod->timeperiod_name }}</td>
            <td>
                {{ Form::open(array('url' => 'timeperiods/' . $timeperiod->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete this Timeperiod', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
                <a class="btn btn-small btn-info" href="{{ URL::to('timeperiods/' . $timeperiod->id) }}">Show this Timeperiod</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop