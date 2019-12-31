@extends('layouts.panel')

@section('content')
@if($errors->any())
@foreach($errors->all() as $message)
    <h3>{{ $message }}</h3>
@endforeach
@endif
				<form class="login100-form validate-form" method="post" action="{{ route('login') }}">
                     @csrf 
					
                      <span class="login100-form-title"  style="padding-bottom: 10px;">
                                {{ __('User Login') }} 
                        </span>
                       <div  >
                          <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                            <span class="login100-form-title">
                                <i class="fa fa-globe"></i>

                            </span>
                           </div>
                           <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
                            <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                                <li class="kt-nav__item kt-nav__item--active">
                                    <a href="{{ route('lang', ['en'])}}"  class="kt-nav__link">
                                        <span class="kt-nav__link-text" >{{__('English')}}</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{ route('lang', ['ar']) }}" class="kt-nav__link">

                                        <span class="kt-nav__link-text">{{__('Arabic')}}</span>
                                    </a>
                                </li>

                            </ul>
                         </div>
                       </div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="username" name="username" placeholder="username"required autocomplete="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                          @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter password">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password"  >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
					</div>
					 <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="remember" type="checkbox" name="remember"
                        value= "{{ old('remember') ? 'checked' : '' }}">
						<label class="label-checkbox100" for="remember">
                         {{ __('Remember Me') }}
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							{{ __('Login') }}
						</button>
					</div>
                   
	               <div class="text-center p-t-90">
                         @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                <span class="txt2">
                                {{ __('Forgot Your Password?') }}
                                 </span>
                            </a>
                         @endif
                    </div>
					<div class="text-center p-t-136">
						<a class="txt2" href="{{ route('register') }}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
@endsection