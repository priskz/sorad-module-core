<!DOCTYPE html>
<html lang="en" style="height: 100%; width: 100%;">
	<head>
		<!-- Favicon -->
		<link rel="shortcut icon" href="{!! URL::asset('favicon.ico') !!}" />

		<!-- Meta Data -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

		@yield('meta-data')

		<title>Daravel</title>

		<!-- Styles -->
		@yield('layout-styles')

		@yield('head-styles')

		@yield('head-scripts')
		
	</head>

	@yield('body')
	
</html>