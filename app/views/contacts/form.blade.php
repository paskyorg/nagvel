@extends('layouts.master')

@section('type')
Contacts
@stop

@section('content')
<h1>{{ $title }}</h1>

{{-- HTML::ul($errors->all()) --}}

<div class="col-md-12">

@if (Request::is('contacts/create'))
    {{ Form::open(array('url' => 'contacts')) }}
@elseif (Request::is('contacts/*/edit'))
    {{ Form::model($contact, array('route' =>
            array('contacts.update', $contact->id), 'method' => 'PUT')) }}
@endif

{{ HTML::form_text('contact_name', $errors) }}
{{ HTML::form_text('alias', $errors) }}
{{ HTML::form_text('email', $errors) }}
{{ HTML::form_checkbox('host_notifications_enabled', $errors) }}
{{ HTML::form_checkbox('service_notifications_enabled', $errors) }}
{{ HTML::form_select('host_notification_period', Timeperiod::all()->lists('timeperiod_name', 'id'), $errors) }}
{{ HTML::form_select('service_notification_period', Timeperiod::all()->lists('timeperiod_name', 'id'), $errors) }}

<div class="form-group row">
{{ Form::label('host_notification_options', 'Host Notification Options:',
    array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-5">
    @foreach ($hno as $o => $v)
    <label style="font-weight: normal">
        @if (Request::is('contacts/*/edit') && in_array($o, $contact->host_notification_options))
        {{ Form::checkbox('host_notification_options[]', $o, true,
            array('class' => 'form-control input-md', 'style' => 'display: inline')) }}
            {{ $v }} ({{ $o }})
        @else
        {{ Form::checkbox('host_notification_options[]', $o, false,
            array('class' => 'form-control input-md', 'style' => 'display: inline')) }} 
            {{ $v }} ({{ $o }})
        @endif
    </label>
    <br />
    @endforeach
    </div>
</div>

<div class="form-group row">
{{ Form::label('service_notification_options', 'Service Notification Options:',
    array('class' => 'col-md-2 control-label')) }}
    <div class="col-md-5">
    @foreach ($sno as $o => $v)
    <label style="font-weight: normal">
        @if (Request::is('contacts/*/edit') && in_array($o, $contact->service_notification_options))
        {{ Form::checkbox('service_notification_options[]', $o, true,
            array('class' => 'form-control input-md', 'style' => 'display: inline')) }}
            {{ $v }} ({{ $o }})
        @else
        {{ Form::checkbox('service_notification_options[]', $o, false,
            array('class' => 'form-control input-md', 'style' => 'display: inline')) }} 
            {{ $v }} ({{ $o }})
        @endif
    </label>
    <br />
    @endforeach
    </div>
</div>

{{ HTML::form_select('host_notification_commands', Command::all()->lists('command_name', 'id'), $errors) }}
{{ HTML::form_select('service_notification_commands', Command::all()->lists('command_name', 'id'), $errors) }}

<div class="form-group row">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }} 
    </div>
</div>

{{ Form::close() }}

</div>

@stop