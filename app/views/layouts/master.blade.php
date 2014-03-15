<!DOCTYPE html>
<html>
<head>
	<title>{{ isset($data['title']) ? $data['title'] : 'Nagvel' }}</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('') }}">Nagvel</a>
	</div>
	<ul class="nav navbar-nav">
            {{ HTML::nav_link('hosts', 'Hosts') }}
            {{ HTML::nav_link('hostgroups', 'Hostgroups') }}
            {{ HTML::nav_link('services', 'Services') }}
            {{ HTML::nav_link('servicegroups', 'Servicegroups') }}
            {{ HTML::nav_link('contacts', 'Contacts') }}
            {{ HTML::nav_link('contactgroups', 'Contactgroups') }}
            {{ HTML::nav_link('timeperiods', 'Timeperiods') }}
            {{ HTML::nav_link('commands', 'Commands') }}
	</ul>
    </nav>
    @yield('content')
</div>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.js" type="text/javascript"></script>
    @yield('js')
    
</body>
</html>