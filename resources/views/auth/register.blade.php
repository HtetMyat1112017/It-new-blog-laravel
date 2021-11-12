@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-dark vh-100 ">
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 mt-3">
                        <div class="card">


                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{asset('logos/logo.PNG')}}" class="w-50" alt="">
                                </div>
                                <hr>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">

                                        <div class="col-md-12">
                                            <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <div class="col-md-12">
                                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <div class="col-md-12">
                                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <div class="col-md-12">
                                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-12  mt-2">
                                            <button type="submit" class="btn btn-primary w-100">
                                                {{ __('Register') }}
                                            </button>
                                            <div class="text-center mt-3">
                                                I have already account ? <a href="{{route("login")}}">Log in</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
