@extends('layouts.default', ['pageTitle' => trans('messages.Sign up')])

@section('body')
<div class="container">
    <div class="row">
        <form class="col l6 offset-l3 m8 offset-m2 s12" method="POST"
              action="{{ route('sign up', compact('lang')) }}">
            {!! csrf_field() !!}
            <h1 class="h2 header center">{{ trans('messages.Create a new account') }}</h1>

            @if (count($errors))
            <h2 class="h4 header">{{ trans('messages.Errors') }}</h2>
            <ul>
                @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <div class="card">
                <div class="card-content row">
                    <div class="input-field col s12">
                        <input id="c0" type="text" name="username" value="{{ old('username') }}" required
                        @if ($errors->has('username'))
                               class="validate invalid"
                        @endif
                        >
                        <label for="c0"
                        @if ($errors->has('username') && old('username'))
                               data-error="{{ $errors->first('username') }}"
                        @endif
                        >{{ trans('messages.Username') }}</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="c1" type="email" name="email" value="{{ old('email') }}" required
                        @if ($errors->has('email'))
                               class="validate invalid"
                        @endif
                        >
                        <label for="c1"
                        @if ($errors->has('email') && old('email'))
                               data-error="{{ $errors->first('email') }}"
                        @endif
                        >{{ trans('E-mail') }}</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="c2" type="password" name="password" required
                        @if ($errors->has('password'))
                               class="validate invalid"
                        @endif
                        >
                        <label for="c2">{{ trans('messages.Password') }}</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="c3" type="password" name="password_confirmation" required
                        @if ($errors->has('password_confirmation'))
                               class="validate invalid"
                        @endif
                        >
                        <label for="c3">{{ trans('messages.Password confirmation') }}</label>
                    </div>
                    <div class="input-field col s12">
                        <select id="c5" name="country">
                            <option value="" disabled
                                @if (!old('country'))
                                    selected
                                @endif
                            >{{ trans('messages.Choose one') }}</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->code }}"
                                @if (old('country') == $country->code)
                                    selected
                                @endif
                            >{{ $country->name }}</option>
                        @endforeach
                        </select>
                        <label for="c5">{{ trans('messages.Your country') }}</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="c4" type="checkbox" name="accept">
                        <label for="c4">{{ trans('messages.I accept the conditions') }}</label>
                    </div>
                </div>
                <div class="card-action row">
                    <div class="input-field col s12 center-align">
                        <button class="btn-large" type="submit">
                            {{ trans('messages.Sign up') }}
                            <i class="mdi-content-add-circle material-icons left"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div class="col l6 offset-l3 m8 offset-m2 s12 center">
            <p>
                {!! trans(
                    'messages.Do you already have an account? Sign in!',
                    ['href' => route('sign in', compact('lang'))]
                ) !!}
            </p>
        </div>
    </div>
</div>
@stop
