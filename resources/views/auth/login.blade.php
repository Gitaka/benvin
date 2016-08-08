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
                    @if(Session::has('successRegister'))
                          <p class="alert alert-success">{{Session::get('successRegister')}}</p>
                    @endif
                    @if(Session::has('singin-fail'))
                     <p class="alert alert-danger">{{Session::get('singin-fail')}}</p>
                    @endif
                       <h2 style="color:#187BBD">Sing In.</h2>
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

				
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address"></br>
								<input type="password" class="form-control" name="password" placeholder="PassWord">


						<div class="form-group">
							<div class="col-md-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-2">
								<button type="submit" class="btn btn-primary">Login</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
							</div>
						</div>
					</form>

@endsection
