<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mandure</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">Mandure</a>
    </div>
    <div class="nav navbar-nav navbar-right">
        @if (Auth::guest())
            <li><a href="{{ URL::route('auth/register') }}">Register</a></li>
            <li><a href="{{ URL::route('auth/login') }}">Sign In</a></li>
        @else
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('tasks.index') }}">Tasks</a></li>
            <li><a href="{{ route('documents.index') }}">Documents</a></li>
            <li><a href="{{ URL::route('auth/logout') }}">Hi, {{{ Auth::user()->name}}} (Sign Out)</a></li>
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

