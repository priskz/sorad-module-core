@extends(Config::get('sorad.front.view.prefix') . 'common.template.email')

@section('content')

  <h1>Reset Your Password</h1>

  <p>
    To reset your password, please visit the following URL:<br>
    {!! URL::route('auth.password.reset', [$token]) !!}
  </p>

@stop