@extends(Config::get('sorad.front.view.prefix') . 'common.layout.foundation')

@section('common-layout-styles')
<!-- Common Layout Styles -->
@stop

@section('body')

	<body id="body-layout-no-col" class="body">

		@yield('header', '<!-- Header -->')

		@yield('main', '<!-- Main -->')

		@yield('footer', '<!-- Footer -->')

		@yield('common-layout-scripts', '<!-- Common Layout Styles -->')

		@yield('layout-scripts', '<!-- Layout Scripts -->')

		@yield('view-scripts', '<!-- View Scripts -->')

	</body>

@stop