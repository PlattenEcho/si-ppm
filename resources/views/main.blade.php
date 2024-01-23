<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Sistem Magang Diskominfo Semarang</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link rel = "icon"
        href="https://diskominfo.majalengkakab.go.id/wp-content/uploads/2017/05/cropped-logo-diskominfo.png"
        type = "image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-jaz79EiSdC9nQ7wGRDQI2ulW1iNQhpZswJDNiIuoqqUjMw5VJdftSsU4en47xFW5aVgiqFLBnW4P2QubN9/jCg=="
        crossorigin="anonymous" />
</head>

<body class="bg-gray-50">
    @include('components.header')
    @yield('body')
    @include('components.footer')
</body>

</html>
