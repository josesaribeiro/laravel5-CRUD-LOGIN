<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mandure</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

</head>
<body style="background-color: #f8f8f8;">
<nav class="navbar navbar-default" style="background-color: black;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ URL::asset('images/mandure.png') }}" style="margin-top: -13px;"></a>
    </div>
    <div class="nav navbar-nav navbar-right">
        @if (Auth::guest())
            <!--<li><a href="{{ URL::route('auth/register') }}">Register</a></li>-->
            <li><a href="{{ URL::route('auth/login') }}" style="color: #fbfbfb;">Ingresar</a></li>
        @elseif(Auth::user()->name === 'Demo User')    
            <li><a href="{{ route('poders.index') }}" style="color: #fbfbfb;">Poder especial</a></li>
            <li><a href="{{ URL::route('auth/logout') }}" style="color: #fbfbfb;">Hola, {{{ Auth::user()->name}}} (Cerrar sesion)</a></li>
        @else
            <li><a href="{{ route('home') }}" style="color: #fbfbfb;">Home</a></li>
            <li><a href="{{ route('tasks.index') }}" style="color: #fbfbfb;">Tasks</a></li>
            <li><a href="{{ route('documents.index') }}" style="color: #fbfbfb;">Documents</a></li>
            <li><a href="{{ route('poders.index') }}" style="color: #fbfbfb;">Poderes</a></li>
        @endif
    </div>
  </div>
</nav>

<main>
    <div class="container">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        
        @yield('content')
    </div>
</main>
</body>
</html>

