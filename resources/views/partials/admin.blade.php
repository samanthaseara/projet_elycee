<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <title>App Name - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{url('assets/css/knacss.min.css')}}" media="all">
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}" media="all">
    @yield('head')
</head>
<body>
<header id="header" role="banner" class="line pam">
    @include('partials.nav_admin')
</header>

<div id="main" role="main" class="line pam">
   <div class="slide"></div>
    <div class="grid-2">
        <div class="main-content">@yield('content')</div>
        <div class="sidebar">
            @section('sidebar')
                <h1>Nos sponsors</h1>
            @show
        </div>
    </div>
</div>
<footer id="footer" role="contentinfo" class="line pam txtcenter">
</footer>
<script src="{{url('assets/js/app.min.js')}}"></script>

</body>
</html>