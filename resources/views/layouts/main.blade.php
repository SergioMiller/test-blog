<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Posts</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="bd-content">
        @yield('content')
    </div>
</div>

<script src="js/app.js"></script>
</body>
</html>