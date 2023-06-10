<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>CMS-PROJECT</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script type="text/javascript" src="http://localhost/laravel_vuejs/vendor/ckeditor/ckeditor/ckeditor.js"></script>
	@vite(['resources/sass/admin/app.scss', 'resources/js/admin/app.js'])
</head>
<body>
	<div id="app">
		<div class="container-fluid">
			<div class="row row_header_admin">
				<div class="col-3 alert  alert-primary nav-admin">
					<div class="alert alert-success clear-bor" role="alert">
						Admin web laravel
					</div>
					@php
					    $addNewsUrl = URL::to('news/addNews');
					@endphp
					<ul class="nav flex-column">
						<menu_admin></menu_admin>
					</ul>
				</div>
				<div class="col-9 clear-padding right_clear">
					<div class="alert alert-success clear-bor" role="alert">
						Admin web laravel
					</div>
					<div class="container row">
						<div class="row_col shadow-lg p-3 bg-body-tertiary rounded main_list">
							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
