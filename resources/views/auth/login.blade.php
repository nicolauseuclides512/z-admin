@extends('auth.layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-3 card">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <input id="email"
                           type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email"
                           placeholder="Email Address"
                           value="{{ old('email') }}"
                           required autofocus>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group row">
                    <input id="password"
                           type="password"
                           placeholder="Password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password"
                           required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group row">
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               name="remember"
                               id="remember"
                               {{ old('remember') ? 'checked' : '' }}
                        >

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <!--                            </div>-->
                </div>

                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
