@extends('layouts.master')

@section('type')
Services
@stop

@section('content')
<h1>{{ $title }}</h1>

{{-- HTML::ul($errors->all()) --}}

<div class="col-md-12">

@if (Request::is('services/create'))
    {{ Form::open(array('url' => 'services')) }}
@elseif (Request::is('services/*/edit'))
    {{ Form::model($service, array('route' =>
            array('services.update', $service->id), 'method' => 'PUT')) }}
@endif

{{ HTML::form_select('host_name', Host::all()->lists('host_name', 'id'), $errors) }}
{{ HTML::form_text('service_description', $errors) }}
{{ HTML::form_select('check_command', Command::all()->lists('command_name', 'id'), $errors) }}
{{ HTML::form_text('max_check_attempts', $errors) }}
{{ HTML::form_text('check_interval', $errors) }}
{{ HTML::form_text('retry_interval', $errors) }}
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