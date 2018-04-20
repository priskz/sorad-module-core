@extends(Config::get('sorad.front.view.prefix') . 'common.layout.no-col-bootstrap')

@section('layout-styles')
<!-- Layout Styles -->
@stop

@section('main')
<div class="container">
	<div class="row">
		<div class="col">
			<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="{!! URL::route('admin.overview') !!}">&nbsp;</a>
				<div class="collapse navbar-collapse" id="adminNav">
					<div class="navbar-nav">
						<a class="nav-item nav-link" href="{!! URL::route('admin.overview') !!}">Admin</a>
					</div>
				</div>
			</nav>
		</div>
	</div>

	@yield('main-inner', '<!-- Main Inner -->')

</div>
@stop

@section('layout-scripts')
<!-- Layout Scripts -->
@stop