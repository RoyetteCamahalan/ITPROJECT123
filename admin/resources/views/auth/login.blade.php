@extends('app')

@section('content')
	<div class="row">

	<div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to ECE Calls</h2>
        </div>
        <!--/span-->
    </div><!--/row-->
		<div class="well col-md-5 center login-box">
				<div class="alert alert-info">
	                Please login with your Email and Password.
	            </div>
	            	<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="input-group input-group-lg {{ $errors->has('email') ? 'has-error' : ''}}">
	                        			<span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
										<input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
									
							</div>
							<span class="text-danger">{{ $errors->first('email') }}</span>
							<div class="clearfix"></div><br>
							<div class="input-group input-group-lg {{ $errors->has('password') ? 'has-error' : ''}}">
	                        			<span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
										<input type="password" class="form-control" placeholder="Password" name="password">
									
							</div>
							<span class="text-danger">{{ $errors->first('password') }}</span>
							<div class="clearfix"></div>
							<div class="input-group input-group-lg">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember"> Remember Me
										</label>
									</div>
							</div>
							<div class="clearfix"></div>
							<p class="center col-md-5">
								<button type="submit" class="btn btn-primary">Login</button>	
							</p>

							<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
						</fieldset>
						
					</form>
	</div>
@endsection