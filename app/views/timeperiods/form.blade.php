@extends('layouts.master')

@section('type')
Timeperiods
@stop

@section('content')
<h1>{{ $data['title'] }}</h1>

{{-- HTML::ul($errors->all()) --}}

<div class="col-md-12">

@if (Request::is('timeperiods/create'))
    {{ Form::open(array('url' => 'timeperiods')) }}
@elseif (Request::is('timeperiods/*/edit'))
    {{ Form::model($timeperiod, array('route' =>
            array('timeperiods.update', $timeperiod->id), 'method' => 'PUT')) }}
@endif

<div class="form-group row">
{{ Form::label('timeperiod_name', 'Timeperiod Name:',
    array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-5">
    {{ Form::text('timeperiod_name', null,
        array('class' => 'form-control input-md')) }}
    </div>
    @if ($errors->has('timeperiod_name'))
    <div class="col-md-4 alert alert-danger">{{ $errors->first('timeperiod_name') }}</div>
    @endif
</div>

<div class="form-group row">
{{ Form::label('alias', 'Alias:',
    array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-5">
    {{ Form::text('alias', null,
        array('class' => 'form-control input-md')) }}
    </div>
    @if ($errors->has('alias'))
    <div class="col-md-4 alert alert-danger">{{ $errors->first('alias') }}</div>
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