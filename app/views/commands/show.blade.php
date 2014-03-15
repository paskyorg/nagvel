@extends('layouts.master')

@section('content')
<h1>Showing {{ $command->command_name }}</h1>

<div>
        <a class="btn btn-small btn-success pull-right" href="{{ URL::to('commands/'.$command->id.'/edit') }}">Edit</a>
        <a class="btn btn-small btn-info pull-right" href="{{ URL::to('commands/write') }}">Write</a>
</div>

<div>
<h2>Código:</h2>
<pre>
define command {
   {{ str_pad('command_name', 20) }} {{ $command->command_name }} 
   {{ str_pad('command_line', 20) }} {{ $command->command_line }} 
}
</pre>
</div>

@stop