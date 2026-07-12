<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MIO Inventory & Maintenance Management System</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

@include('partials.sidebar')

<div class="content">

    @include('partials.navbar')

    <div class="container-fluid p-4">

        @yield('content')

    </div>

    @include('partials.footer')

</div>

</body>
</html>