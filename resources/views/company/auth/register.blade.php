@extends('layouts.panel')

@section('content')
                        
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="login100-form validate-form" >
                        @csrf
                         <span class="login100-form-title"  style="padding-bottom: 10px;">
                                {{ __('Register Company') }} 
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
                       
                      
                        <div class="form-group">
							<label for="username" class="cols-sm-2 control-label">{{ __('Username') }}</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control @error('username') 
                                is-invalid @enderror" name="username" id="username"  placeholder="{{__('Enter your Name')}}" value="{{ old('username') }}" 
                                    required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
							</div>
                        </div>
                        
                        <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">{{ __('First Name') }}</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control @error('name') 
                                is-invalid @enderror" name="name" id="name"  placeholder="{{ __('Enter your First Name') }}" value="{{ old('name') }}" 
                                    required autocomplete="name" >

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
							</div>
                        </div>
                        <div class="form-group">
							<label for="lastname" class="cols-sm-2 control-label">{{ __('Last Name') }}</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<input type="text" class="form-control @error('lastname') 
                                is-invalid @enderror" name="lastname" id="lastname"  placeholder="{{__('Enter your Last Name')}}" value="{{ old('lastname') }}" 
                                    required autocomplete="lastname" >

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
							</div>
                        </div>
                        <div class="form-group">
							<label for="email" class="cols-sm-2 control-label">{{ __('E-Mail Address') }}</label>
							<div class="cols-sm-10">
								<div class="input-group">
									 <input type="email" class="form-control @error('email') 
                                is-invalid @enderror" name="email" id="email"  placeholder="{{__('Enter your email')}}" 
                                    value="{{ old('email') }}" 
                                    required autocomplete="email" >

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
							</div>
                        </div>
                        <div class="form-group">
							<label for="password" class="cols-sm-2 control-label">{{ __('Password') }}</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="password" class="form-control @error('password') 
                                is-invalid @enderror" name="password" id="password"  placeholder="{{__('Enter your password')}}" 
                                    
                                    required autocomplete="new-password" >

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
							</div>
                        </div>
                       
                        <div class="form-group">
							<label for="password-confirm" class="cols-sm-2 control-label">{{ __('Confirm Password') }}</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="password" class="form-control " 
                                    name="password_confirmation" id="password-confirm" 
                                     placeholder="{{__('Enter your password-confirm')}}" 
                                    required autocomplete="new-password" >

                                </div>
							</div>
						</div>
        
                        
                        <div class="form-group ">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="login100-form-btn" >
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
           
@endsection
