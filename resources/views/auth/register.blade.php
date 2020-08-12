@extends('layouts.register')

@section('content')
<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 align-self-center">
                        <div class="card">
                            <div class="card-body">

                                <form class="form-horizontal" method="POST" action="/register">
									@csrf

					<div class="form-group row">
                                        	<label for="name" class="col-md-4 control-label">Name</label>
                                        	<div class="col-md-6">
                                            		<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                            		@if ($errors->has('name'))
                                            		<span class="help-block">
                                                		<strong>{{ $errors->first('name') }}</strong>
                                    			</span>
                                            		@endif
                                		</div>
                            		</div>
                                    	<div class="form-group row">
                                        	<label for="username" class="col-md-4 control-label">Username</label>
                                        	<div class="col-md-6">
                                            		<input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
                                            		@if ($errors->has('username'))
                                    			<span class="help-block">
                                                		<strong>{{ $errors->first('username') }}</strong>
                                            		</span>
                                            		@endif
                                		</div>
                                    	</div>

                                    	<div class="form-group row">
                                        	<label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                        	<div class="col-md-6">
                                            		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                            		@if ($errors->has('email'))
                                            		<span class="help-block">
                                                		<strong>{{ $errors->first('email') }}</strong>
                                            		</span>
                                            		@endif
                                		</div>
                                    	</div>

                                    	<div class="form-group row">
                                        	<label for="password" class="col-md-4 control-label">Password</label>
                                        	<div class="col-md-6">
                                            		<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                            		@if ($errors->has('password'))
                                            		<span class="help-block">
                                                		<strong>{{ $errors->first('password') }}</strong>
                                            		</span>
                                            		@endif
                                		</div>
                                    	</div>

                                    	<div class="form-group row">
                                        	<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                        	<div class="col-md-6">
                                            		<input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation">
                                        	</div>
                                    	</div>
                                    	<div class="form-group row text-center">
                                        	<div class="col-md-12">
                                            		<button type="submit" class="btn btn-dark" name="action" value="send">
                                               			Next
                                            		</button>
                                        	</div>
                                    	</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
