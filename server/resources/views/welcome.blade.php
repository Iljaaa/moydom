@php
    $cssFiles = glob(public_path('static/css/main.*.css'));
    $jsFiles = glob(public_path('static/js/main.*.js'));
@endphp
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel React</title>

    @foreach ($cssFiles as $cssFile)
        <link rel="stylesheet" href="{{ asset('static/css/' . basename($cssFile)) }}">
    @endforeach
</head>
<body>
<div id="root"></div>
@foreach ($jsFiles as $jsFile)
    <script src="{{ asset('static/js/' . basename($jsFile)) }}"></script>
@endforeach
</body>
</html>