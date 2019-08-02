<html lang="en">
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>

<div class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <div class="row">
            <a href="/" class="navbar-brand">Home</a>
        </div>
    </div>
</div>

<br><br>

<div class="container">

    @yield('content')


</div>



</body>
</html>