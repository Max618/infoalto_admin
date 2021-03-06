<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>Painel | @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/vendor/chartist/css/chartist-custom.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('admin/img/favicon.png') }}">
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('admin/datatables/dataTables.bootstrap4.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
	@yield('css')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
        @component('layout.navbar')
        @endcomponent
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
        @component('layout.leftsidebar')
        @endcomponent
		<!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@if(Session::has('success'))
						@component('layout.messages',["type" => "success"])
							{{ Session::get('success') }}
						@endcomponent
					@elseif(Session::has('error'))
						@component('layout.messages',["type" => "error"])
						{{ Session::get('error') }}
						@endcomponent
					@elseif(Session::has('info'))
						@component('layout.messages',["type" => "info"])
						{{ Session::get('info') }}
						@endcomponent
					@elseif(Session::has('warning'))
						@component('layout.messages',["type" => "warning"])
						{{ Session::get('warning') }}
						@endcomponent
					@endif


					@if($errors->any())
						@foreach($errors->all() as $error)
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-times-circle"></i> {{ $error }}
							</div>
						@endforeach
					@endif


                    @yield('content')
                </div>
            </div>
        </div>
        <!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved. Adaptado por <a href="https://www.infoalto.com.br" target="_blank">InfoAlto</a>.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ asset('admin/scripts/klorofil-common.js') }}"></script>
	<!-- DataTables -->
	<script src="{{ asset('admin/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('admin/datatables/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ asset('admin/scripts/custom.js') }}"></script>
	@yield('script')
</body>

</html>
