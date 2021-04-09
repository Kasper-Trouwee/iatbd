<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <title>@yield('title')</title>
</head>
<body>
    <nav id="js--nav" class="navigation">
        <a class="navigation__link" href="/">Home</a>
        <a class="navigation__link" href="/petowner">Pet Owners</a>
        <a class="navigation__link" href="/sitter">Sitters</a>
        @if(!\Auth::user())
            <a class="navigation__link" href="/register">Register</a>
        @elseif(\Auth::user()->role === 'Pet owner')
            <a class="navigation__link" href="/petowner/register">Register Pet</a>
            <a class="navigation__link" href="/petowner/requests">Requests</a>
            <a class="navigation__link" href="/review">Review</a>
        @elseif(\Auth::user()->role === 'Admin')
            <a class="navigation__link" href="/content-manager/users">Users</a>
            <a class="navigation__link" href="/content-manager/deleterequests">Requests</a>
        @endif

        @if(\Auth::user())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="navigation__link" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log out') }}</a>
            </form>
        @endif
        <a class="navigation__link navigation__icon" href="javascript:void(0);" id="js--menu">&#9776;</a>
        
    </nav>
    @yield('content')
    <script src="../js/nav.js"></script>
</body>
</html>