<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>

<script>
    document.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelectorAll('a').forEach(function(l) {
                l.style.pointerEvents = 'none';
                l.style.opacity = '0.5';
            });
            window.location.href = this.href;
        });
    });
</script>
</html>
