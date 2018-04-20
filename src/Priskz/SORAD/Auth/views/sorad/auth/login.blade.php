@extends(Config::get('sorad.auth.view.prefix') . 'auth.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<div class="card-group">
			<div class="card">
				<div class="card-block">
					<h3 class="card-title">Have an account?</h3>
					@include(Config::get('sorad.auth.view.prefix') . 'auth.partial.login-form')
				</div>
			</div>
			<div class="card text-center">
				<div class="card-block">
					<h3 class="card-title">Not a member?</h3>
					<a href="{!! URL::route('auth.register') !!}" class="btn btn-primary">Register Here!</a>
				</div>
				<div class="card-block">
					<h3 class="card-title">Forgot?</h3>
					<a href="{!! URL::route('auth.password.forgot') !!}" class="btn btn-primary">Forgot Password</a>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop