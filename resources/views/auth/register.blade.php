@extends('layouts.contact')

@section('form')

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                    <h2 style="color:#187BBD">Register.</h2>
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">


								<input type="text" placeholder="Names"class="form-control" name="name" value="{{ old('firstname') }}"></br>

								<!--<input type="text" placeholder="Last Name"class="form-control" name="lastname" value="{{ old('lastname') }}"></br>-->
			
								<input type="email" placeholder="Email Address"class="form-control" name="email" value="{{ old('email') }}"></br>

								<input type="text"placeholder="Phone Number" class="form-control" name="phoneNo" value="{{ old('phoneNo') }}"></br>

								<input type="password" class="form-control" name="password" placeholder="PassWord"></br>

								<!--<input type="text" placeholder="Location"class="form-control" name="location" value="{{ old('location') }}"></br>-->
		
								<input type="text" placeholder="UserName/Organisation"class="form-control" name="username" value="{{ old('username') }}"></br>


                      <input type="hidden" value="0" name="accesslevel">

						<div class="form-group">
							<div class="col-md-2">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>

@endsection
