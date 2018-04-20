@extends(Config::get('sorad.account.view.prefix') . 'account.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<div class="card-group">
			<div class="card">
				<div class="card-block">
					<h3 class="card-title">{!! $user->getUsername() !!}</h3>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{!! $user->getEmail() !!}" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="first_name" class="col-sm-2 col-form-label">First Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{!! $user->getFirstName() !!}" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{!! $user->getLastName() !!}" readonly>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop