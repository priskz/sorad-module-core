<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="{!! URL::route('front.home') !!}">Home</a>
<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
	<ul class="navbar-nav mr-auto mt-2 mt-md-0">
		@if(Auth::user())
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hello, {!! Auth::user()->getUsername() !!}!</a>
			<div class="dropdown-menu" aria-labelledby="navbarLogin">
				<a class="dropdown-item" href="{!! URL::route('account.edit') !!}">Edit My Account</a>
				<a class="dropdown-item" href="{!! URL::route('auth.logout') !!}">Log Out</a>
			</div>
		</li>
		@endif

		@yield('nav-primary')

		@if(Auth::guest())
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
			<div class="dropdown-menu" aria-labelledby="navbarLogin">
				<div class="container">
					@include(Config::get('sorad.front.view.prefix') . 'common.partial.login-form')
				</div>
			</div>
		</li>
		@endif
	</ul>
</div>