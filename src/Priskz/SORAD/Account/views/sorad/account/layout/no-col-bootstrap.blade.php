@extends(Config::get('sorad.front.view.prefix') . 'common.layout.no-col-bootstrap')

@section('layout-styles')
<!-- Layout Styles -->
@stop

@section('main')
<div class="container">

	@yield('main-inner', '<!-- Main Inner -->')

</div>
@stop

@section('layout-scripts')
<!-- Layout Scripts -->
@stop