@extends('layouts.master')

@section('content')
<h1>Showing {{ $timeperiod->timeperiod_name }}</h1>

<div>
        <a class="btn btn-small btn-success pull-right" href="{{ URL::to('timeperiods/'.$timeperiod->id.'/edit') }}">Edit</a>
        <a class="btn btn-small btn-info pull-right" href="{{ URL::to('timeperiods/write') }}">Write</a>
</div>

<div>
<h2>Código:</h2>
<pre>
define timeperiod {
   {{ str_pad('timeperiod_name', 20) }} {{ $timeperiod->timeperiod_name }} 
   {{ str_pad('alias', 20) }} {{ $timeperiod->alias }} 
}
</pre>
</div>

@stop