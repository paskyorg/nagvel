@extends('layouts.master')

@section('type')
Commands
@stop

@section('content')
<h1>{{ $data['title'] }}</h1>

{{-- HTML::ul($errors->all()) --}}

<div class="col-md-12">

@if (Request::is('commands/create'))
    {{ Form::open(array('url' => 'commands')) }}
@elseif (Request::is('commands/*/edit'))
    {{ Form::model($command, array('route' =>
            array('commands.update', $command->id), 'method' => 'PUT')) }}
@endif

<div class="form-group row">
{{ Form::label('command_name', 'Command Name:',
    array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-5">
    {{ Form::text('command_name', null,
        array('class' => 'form-control input-md')) }}
    </div>
    @if ($errors->has('command_name'))
    <div class="col-md-4 alert alert-danger">{{ $errors->first('command_name') }}</div>
    @endif
</div>

<div class="form-group row">
{{ Form::label('command_line', 'Command Line:',
    array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-5">
    {{ Form::textarea('command_line', null,
        array('class' => 'form-control input-md')) }}
    </div>
    @if ($errors->has('command_line'))
    <div class="col-md-4 alert alert-danger">{{ $errors->first('command_line') }}</div>
    @endif
</div>

<div class="form-group row">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
    {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

</div>

@stop