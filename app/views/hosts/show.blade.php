@extends('layouts.master')

@section('content')
<h1>Showing {{ $host->host_name }}</h1>

<div>
        <a class="btn btn-small btn-success pull-right" href="{{ URL::to('hosts/'.$host->id.'/edit') }}">Edit</a>
        <a class="btn btn-small btn-info pull-right" href="{{ URL::to('hosts/write') }}">Write</a>
</div>

<div>
<h2>Código:</h2>
<pre>
define host {
   {{ str_pad('host_name', 30) }} {{ $host->host_name }} 
   {{ str_pad('alias', 30) }} {{ $host->alias }} 
   {{ str_pad('address', 30) }} {{ $host->address }} 
   {{ str_pad('max_check_attempts', 30) }} {{ $host->max_check_attempts }} 
   {{ str_pad('check_period', 30) }} {{ $host->checkPeriod->timeperiod_name }} 
   {{ str_pad('notification_interval', 30) }} {{ $host->notification_interval }} 
   {{ str_pad('notification_period', 30) }} {{ $host->notificationPeriod->timeperiod_name }} 
}
</pre>
</div>

@stop