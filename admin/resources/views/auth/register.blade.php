@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">First Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="fname" value="{{ old('fname') }}">
								<span class="text-danger">{{ $errors->first('fname') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Middle Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="mname" value="{{ old('mname') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Last Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="lname" value="{{ old('lname') }}">
								<span class="text-danger">{{ $errors->first('lname') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Position</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="position" value="{{ old('position') }}">
								<span class="text-danger">{{ $errors->first('position') }}</span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								<span class="text-danger">{{ $errors->first('email') }}</span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
								<span class="text-danger">{{ $errors->first('password') }}</span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
