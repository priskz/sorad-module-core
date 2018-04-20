@extends(Config::get('sorad.auth.view.prefix') . 'auth.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-block">
				<h3 class="card-title">Forgot Password</h3>
				@include(Config::get('sorad.auth.view.prefix') . 'auth.partial.password-forgot-form')
			</div>
		</div>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop