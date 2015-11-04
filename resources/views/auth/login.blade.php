@extends('layouts.default', ['pageTitle' => 'Se connecter'])

@section('body')
<div class="container">
    <div class="row">
        <form class="col l6 offset-l3 m8 offset-m2 s12" method="POST" action="{{ URL::to('auth/login') }}">
            {!! csrf_field() !!}
            <h1 class="h2 header center">Bienvenue</h1>

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
                        >Nom d'utilisateur ou e-mail</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="c1" type="password" name="password" id="password"
                        @if ($errors->has('password'))
                               class="validate invalid"
                        @endif
                        >
                        <label for="c1">Mot de passe</label>
                    </div>
                </div>
                <div class="card-action row">
                    <div class="input-field col m6 s12 center-align">
                        <button class="btn-large" type="submit">
                            Se&nbsp;connecter
                            <i class="mdi-action-account-circle material-icons left"></i>
                        </button>
                    </div>
                    <div class="input-field col m6 s12">
                        <input id="c2" type="checkbox" name="remember" checked>
                        <label for="c2"> Se souvenir de moi</label>
                    </div>
                </div>
            </div>
        </form>
        <div class="col l6 offset-l3 m8 offset-m2 s12 center">
            <p>
                Vous n'avez pas encore de compte? Alors <a href="{{ Url::to('auth/register') }}">inscrivez-vous</a>!
            </p>
        </div>
    </div>
</div>
@stop
