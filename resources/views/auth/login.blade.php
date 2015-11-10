@extends('layouts.default', ['pageTitle' => trans('messages.Sign up')])

@section('body')
<div class="container">
    <div class="row">
        <form class="col l6 offset-l3 m8 offset-m2 s12" method="POST"
              action="{{ route('sign in', compact('lang')) }}">
            {!! csrf_field() !!}
            <h1 class="h2 header center">{{ trans('messages.Welcome') }}</h1>

            <div class="card">
                <div class="card-content row">
                    <div class="input-field col s12">
                        <input id="c0" type="text" name="username" value="{{ old('username') }}"
                        @if ($errors->has('username'))
                               class="validate invalid"
                        @endif
                        >
                        <label for="c0"
                        @if ($errors->has('username') && old('username'))
                               data-error="{{ $errors->first('username') }}"
                        @endif
                        >{{ trans('messages.Username or E-mail') }}</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="c1" type="password" name="password" id="password"
                        @if ($errors->has('password'))
                               class="validate invalid"
                        @endif
                        >
                        <label for="c1">{{ trans('messages.Password') }}</label>
                    </div>
                </div>
                <div class="card-action row">
                    <div class="input-field col m6 s12 center-align">
                        <button class="btn-large" type="submit">
                            {{ trans('messages.Sign in') }}
                            <i class="mdi-action-account-circle material-icons left"></i>
                        </button>
                    </div>
                    <div class="input-field col m6 s12">
                        <input id="c2" type="checkbox" name="remember" checked>
                        <label for="c2"> {{ trans('messages.Remember me') }}</label>
                    </div>
                </div>
            </div>
        </form>
        <div class="col l6 offset-l3 m8 offset-m2 s12 center">
            <p>
                {!! trans(
                    'messages.Are you new here? Sign up!',
                    ['href' => route('sign up', compact('lang'))]
                ) !!}
            </p>
        </div>
    </div>
</div>
@stop
