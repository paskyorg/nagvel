@extends('layouts.master')

@section('type')
Hosts
@stop

@section('content')
<h1>{{ $title }}</h1>

{{-- HTML::ul($errors->all()) --}}

<div class="col-md-12">

@if (Request::is('hosts/create'))
    {{ Form::open(array('url' => 'hosts')) }}
@elseif (Request::is('hosts/*/edit'))
    {{ Form::model($host, array('route' =>
            array('hosts.update', $host->id), 'method' => 'PUT')) }}
@endif

{{ HTML::form_text('host_name', $errors) }}
{{ HTML::form_text('alias', $errors) }}
{{ HTML::form_text('address', $errors) }}
{{ HTML::form_text('max_check_attempts', $errors) }}
{{ HTML::form_select('check_period', Timeperiod::all()->lists('timeperiod_name', 'id'), $errors) }}
{{ HTML::form_text('notification_interval', $errors) }}
{{ HTML::form_select('notification_period', Timeperiod::all()->lists('timeperiod_name', 'id'), $errors) }}

<div class="form-group row">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }} 
    </div>
</div>

{{ Form::close() }}

</div>

@stop