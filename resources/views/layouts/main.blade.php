<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-dark bg-dark" style="margin-bottom: 1em;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Posts</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">

        @yield('breadcrumb')

        <h1>@yield('page-title')</h1>

        <div class="bd-content">
            @include('templates.flash-message')
            @yield('content')
        </div>
        @include('templates.user-agent')
    </div>
</div>
<script src="/js/app.js"></script>
</body>
</html>
