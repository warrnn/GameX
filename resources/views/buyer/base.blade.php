<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>{{ $page_title }}</title>
    <link rel="icon" href="{{ asset('assets/logo/logo_dark.png') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('resources')

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Javascripts -->
    <script src="{{ asset('js/main.js') }}"></script>
</head>

<body class="bg-neutral overflow-x-hidden">
    <script>
        $(document).ready(function() {
            $("#small-search").on("keyup", function() {
                let query = $(this).val();
                $.ajax({
                    url: '{{ route('buyer.searchOwnedGames') }}',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(results) {
                        $("#owned_games_results").empty();

                        $("#owned_games_results").append(results);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    },
                });
            });
        });
    </script>


    @include('buyer.includes.logged_navbar')
    <section class="pt-20">
        @yield('content')
    </section>
    @include('footer')
</body>

</html>