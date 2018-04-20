@extends(Config::get('sorad.account.view.prefix') . 'account.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-block">
				<h3 class="card-title">Edit Account</h3>
				@include(Config::get('sorad.account.view.prefix') . 'account.partial.edit-form')
			</div>
		</div>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop