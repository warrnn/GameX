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
    <script src="{{ asset('js/main.js') }}"></script>

    <style>
        /* div {
            border: 1px solid red
        } */
    </style>
</head>

<body class="bg-neutral overflow-x-hidden ">
    @if ($data['page_title'] == 'GameX')
        @include('user.includes.guest_navbar')
    @elseif ($data['page_title'] != 'GameX')
        @include('user.includes.logged_navbar')
    @endif
    <section class="pt-20">
        @yield('content')
    </section>
</body>

</html>