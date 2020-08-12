@extends('layouts.guest')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 align-self-center">
			<div class="card">
				<div class="card-body">

					<form class="form-horizontal" method="POST" name="loginform" action="{{ route('login') }}">
						@csrf

						@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif
						@if (session('warning'))
							<div class="alert alert-warning">
								{{ session('warning') }}
							</div>
						@endif

						<div class="form-group row{{ $errors->has('username') ? ' has-error' : '' }}">
							<label for="username" class="col-md-4 control-label">Username</label>
								<div class="col-md-6">
									<input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}">
									@if ($errors->has('username'))
											<span class="help-block">
												<strong>{{ $errors->first('username') }}</strong>
											</span>
									@endif
								</div>
						</div>

						<div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Password</label>
								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
									@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
									@endif
								</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-dark text-center" name="action" value="send">Login</button>

							</div>
							<div class="col-md-12 text-center">
								<a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password? </a>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

					</form>
	 			</div>
			</div>
		</div>
	</div>
</div>
@endsection
