<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body style="background-color: #dafffa">

<!-- Header -->
<header class="bg-primary text-white py-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('image/download.png') }}" alt="Logo" class="img-fluid" style="max-height: 50px;">
        </div>
        <h4 class="text-center my-3">
            سامانه دانشگاه ازاد دندان پزشکی تهران
        </h4>
    </div>
</header>



<!-- Your page content -->
<div class="container">
    @yield('content')
</div>

<!-- Footer -->
<footer class="bg-light text-center py-3  bg-success">
    <div class="container">
        <p>
            تمامی حقوق مادی و معنوی این سامانه متعلق  به دانشگاه ازاد دندان پزشکی تهران می باشد
        </p>
    </div>
</footer>

<!-- Include the JavaScript files at the end of the body section -->
<script src="{{ asset('js/app.js') }}"></script>
@livewireScripts
</body>
</html>
