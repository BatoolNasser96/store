@extends('layouts.panel')

@section('content')

				<form class="login100-form validate-form" method="post" action="{{ route('admin.login') }}">
                     @csrf 
					
                       <span class="login100-form-title"  style="padding-bottom: 10px;">
                                {{ __('Admin Login') }} 
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
					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{__('Email')}}" required autocomplete="current-email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter password">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{__('Password')}}" required autocomplete="current-password"  >
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
                       
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							{{ __('Login') }}
						</button>
					</div>
                   
	             
					
				</form>
@endsection