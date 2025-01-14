<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>{{ $page_title }}</title>
    <link rel="icon" href="{{ asset('assets/logo/logo_dark.png') }}">

    @include('resources')

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">

    <!-- Javascripts -->
    <script src="{{ asset('js/seller/datatables.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>

<body class="bg-neutral overflow-x-hidden overflow-y-hidden">
    <div id="loader" class="bg-black h-screen fixed top-0 left-0 w-full z-[9999]">
        <div class="flex justify-center items-center h-full">
            <div class='cssload-loader'>
                <div class='cssload-inner cssload-one'></div>
                <div class='cssload-inner cssload-two'></div>
                <div class='cssload-inner cssload-three'></div>
            </div>
        </div>
    </div>
    @include('seller.includes.seller_navbar')
    <section class="pt-20">
        @yield('content')
    </section>
    @include('footer')
</body>

</html>