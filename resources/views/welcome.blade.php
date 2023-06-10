<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <addproduct></addproduct>
        <menu_btn></menu_btn>
        <banners_web> </banners_web>
        <breadcrumb></breadcrumb>
        <section class="pos4">
            <div class="container">
                <div class="row main_new">
                    <div class="col-md-7">
                        <new_right><new_right/>
                    </div>
                    <div class="col-md-4">
                        <new_left><new_left/>
                    </div>
                </div>
            </div>
        </section>
        <footer_main />
        @yield('content')
    </div>
</body>
</html>
