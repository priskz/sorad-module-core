@extends(Config::get('sorad.front.view.prefix') . 'common.layout.no-col')

@section('common-layout-styles')
<link rel="stylesheet" href="{{ asset('dist/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('dist/misc/toastr.min.css') }}"/>
@stop

@section('header')
@include(Config::get('sorad.front.view.prefix') . 'common.partial.header')
@stop

@section('footer')
@include(Config::get('sorad.front.view.prefix') . 'common.partial.footer')
@stop

@section('common-layout-scripts')
<script src="{{ asset('dist/bootstrap-4.0.0-alpha.6-dist/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('dist/bootstrap-4.0.0-alpha.6-dist/js/tether-1.4.0.min.js') }}"></script>
<script src="{{ asset('dist/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/misc/toastr.min.js') }}"></script>
<script src="{{ asset('dist/misc/notifier.js') }}"></script>
<script src="{{ asset('dist/misc/ajaxer.js') }}"></script>

<script>
	// @todo: Display notifications
</script>
@stop