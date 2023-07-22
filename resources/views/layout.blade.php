<!DOCTYPE html>
<html lang="fa">
<head>
    <!-- Other head elements -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('title')
</head>
<body>
<!-- Your page content -->
@yield('content')
<!-- Include the JavaScript files at the end of the body section -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
