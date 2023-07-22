<!DOCTYPE html>
<html lang="fa">

<title>
    @yield('title')
</title>

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<!-- Your page content -->
@yield('content')
<!-- Include the JavaScript files at the end of the body section -->
<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
