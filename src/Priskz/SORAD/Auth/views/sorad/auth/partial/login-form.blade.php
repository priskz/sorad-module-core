<form action="{!! URL::route('auth.login') !!}" method="POST">
	<div class="form-group row">
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>
	</div>
	<div class="form-group row">
		<div class="offset-sm-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
	</div>
</form>