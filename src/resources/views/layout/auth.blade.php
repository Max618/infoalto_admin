<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="fullscreen-bg">

<head>
	<title>{{ env('APP_NAME') }} | @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('admin/img/favicon.png') }}">
</head>

<body>
    <!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				@yield('content')
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
