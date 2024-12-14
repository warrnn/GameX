<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>{{ $data['page_title'] }}</title>
    <link rel="icon" href="{{ asset('assets/logo/logo_dark.png') }}">

    @include('resources')

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Javascripts -->
    <script src="{{ asset('js/seller/datatables.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>

<body class="bg-neutral overflow-x-hidden">
    @include('admin.includes.admin_navbar')
    <section class="pt-20">
        @yield('content')
    </section>
    @include('footer')
</body>

</html>