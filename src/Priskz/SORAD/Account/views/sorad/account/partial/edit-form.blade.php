<form action="{!! URL::route('account.update') !!}" method="POST">
	<!-- @todo: Laravel hack to mock PUT requests through POST -->
	<input type="hidden" name="_method" value="PUT">
	<div class="form-group row">
		<label for="username" class="col-sm-2 col-form-label">Username</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{!! $user->getUsername() !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{!! $user->getEmail() !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{!! $user->getPassword !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="password_confirmation" class="col-sm-2 col-form-label">Confirm</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Again" value="">
		</div>
	</div>
	<div class="form-group row">
		<label for="first_name" class="col-sm-2 col-form-label">First Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{!! $user->getFirstName() !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{!! $user->getLastName() !!}">
		</div>
	</div>
	<div class="form-group row">
		<div class="offset-sm-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>