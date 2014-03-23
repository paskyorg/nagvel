@extends('layouts.master')

@section('content')
<h1>Showing {{ $service->service_description }} on {{ $service->host->host_name }}</h1>

<div>
        <a class="btn btn-small btn-success pull-right" href="{{ URL::to('services/'.$service->id.'/edit') }}">Edit</a>
        <a class="btn btn-small btn-info pull-right" href="{{ URL::to('services/write') }}">Write</a>
</div>

<div>
<h2>Código:</h2>
<pre>
define service {
   {{ str_pad('host_name', 30) }} {{ $service->host->host_name }} 
   {{ str_pad('service_description', 30) }} {{ $service->service_description }} 
   {{ str_pad('check_command', 30) }} {{ $service->checkCommand->command_name }} 
   {{ str_pad('max_check_attempts', 30) }} {{ $service->max_check_attempts }} 
   {{ str_pad('check_interval', 30) }} {{ $service->check_interval }} 
   {{ str_pad('retry_interval', 30) }} {{ $service->retry_interval }} 
   {{ str_pad('check_period', 30) }} {{ $service->checkPeriod->timeperiod_name }} 
   {{ str_pad('notification_interval', 30) }} {{ $service->notification_interval }} 
   {{ str_pad('notification_period', 30) }} {{ $service->notificationPeriod->timeperiod_name }} 
}
</pre>
</div>

@stop