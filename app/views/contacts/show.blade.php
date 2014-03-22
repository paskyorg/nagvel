@extends('layouts.master')

@section('content')
<h1>Showing {{ $contact->contact_name }}</h1>

<div>
        <a class="btn btn-small btn-success pull-right" href="{{ URL::to('contacts/'.$contact->id.'/edit') }}">Edit</a>
        <a class="btn btn-small btn-info pull-right" href="{{ URL::to('contacts/write') }}">Write</a>
</div>

<div>
<h2>Código:</h2>
<pre>
define contact {
   {{ str_pad('contact_name', 30) }} {{ $contact->contact_name }} 
   {{ str_pad('alias', 30) }} {{ $contact->alias }} 
   {{ str_pad('host_notifications_enabled', 30) }} {{ $contact->host_notifications_enabled }} 
   {{ str_pad('service_notifications_enabled', 30) }} {{ $contact->service_notifications_enabled }} 
   {{ str_pad('host_notification_period', 30) }} {{ $contact->hostNotificationPeriod->timeperiod_name }} 
   {{ str_pad('service_notification_period', 30) }} {{ $contact->serviceNotificationPeriod->timeperiod_name }} 
   {{ str_pad('host_notification_options', 30) }} {{ $contact->host_notification_options }} 
   {{ str_pad('service_notification_options', 30) }} {{ $contact->service_notification_options }} 
   {{ str_pad('host_notification_commands', 30) }} {{ $contact->hostNotificationCommands->command_name }} 
   {{ str_pad('service_notification_commands', 30) }} {{ $contact->serviceNotificationCommands->command_name }} 
   {{ str_pad('email', 30) }} {{ $contact->email }} 
}
</pre>
</div>

@stop