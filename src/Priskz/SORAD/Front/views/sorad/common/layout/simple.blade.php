@extends(Config::get('sorad.front.view.prefix') . 'common.layout.foundation')

@section('layout-styles')

	@yield('styles')

@stop

@section('body')

	<body id="layout-simple-body" class="body">

		@yield('main')

		@yield('scripts')

	</body>

@stop
