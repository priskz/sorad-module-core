<form action="{!! URL::route('auth.password.reset', $token) !!}" method="POST">
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email">
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>
	</div>
	<div class="form-group row">
		<label for="password_confirmation" class="col-sm-2 col-form-label">Confirm</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Again">
		</div>
	</div>
	<div class="form-group row">
		<div class="offset-sm-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Reset</button>
		</div>
	</div>
</form>