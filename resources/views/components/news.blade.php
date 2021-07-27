<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/textStyles.css') }}">

    <style>
        body {
            font-family: karla;
        }

        .search-input:focus{
            outline: none;
        }
        img {
            max-width: 100%;
            height: auto;
        }

    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    @stack('scripts')

</head>

<body class="bg-gray-100 flex flex-col h-screen justify-between items-center">
    <x-news-navigation></x-news-navigation>
    {{ $slot }}
    <x-news-footer></x-news-footer>
</body>

</html>
