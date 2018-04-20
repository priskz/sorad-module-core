<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Favicon -->
		<link rel="shortcut icon" href="{!! URL::asset('favicon.ico') !!}" />
		<!-- Meta Data -->
		<title>Daravel</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		@yield('meta-data', '<!-- Additonal Meta Data -->')

		@yield('head-styles', '<!-- Head Styles -->')

		@yield('common-layout-styles', '<!-- Common Layout Styles -->')

		@yield('layout-styles', '<!-- Layout Styles -->')

		@yield('view-styles', '<!-- View Styles -->')

		@yield('head-scripts', '<!-- Head Scripts -->')
		
	</head>

	@yield('body', '<!-- Body -->')
</html>