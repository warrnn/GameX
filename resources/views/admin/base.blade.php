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

    <!-- Javascripts -->
    <script src="{{ asset('js/seller/datatables.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <style>
		label, .dt-search label, .dt-info, tr {
			color: white;
		}

		div.dt-container .dt-search input {
			border: 1px solid black;
			border-radius: 3px;
			padding: 5px;
			background-color: transparent;
			color: inherit;
			margin-left: 3px;
			color: black;
		}

		div.dt-container .dt-input {
			border: 1px solid black;
			border-radius: 3px;
			padding: 5px;
			background-color: transparent;
			color: black;
		}

		div.dt-container .dt-paging .dt-paging-button.disabled, div.dt-container .dt-paging .dt-paging-button.disabled:hover, div.dt-container .dt-paging .dt-paging-button.disabled:active {
			cursor: default;
			color: black !important;
			border: 1px solid transparent;
			background: transparent;
			box-shadow: none;
		}

	</style>
</head>

<body class="bg-neutral overflow-x-hidden">
    @include('admin.includes.admin_navbar')
    <section class="pt-20">
        @yield('content')
    </section>
    @include('footer')
</body>

</html>