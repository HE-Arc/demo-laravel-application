@extends('layouts.default', ['pageTitle' => 'Se connecter'])

@section('body')
<div class="container">
    <div class="row">
        <form class="col l4 offset-l4 m8 offset-m2 s12" method="POST" action="{{ URL::to('auth/login') }}">
            {!! csrf_field() !!}
            <h1 class="h2 header center">Bienvenue</h1>

            <div class="card">
                <div class="card-content row">
                    <div class="input-field col s12">
                        <label for="c0">Nom d'utilisateur ou e-mail</label>
                        <input id="c0" type="text" name="username" value="{{ old('email') }}">
                    </div>
                    <div class="input-field col s12">
                        <label for="c1">Mot de passe</label>
                        <input id="c1" type="password" name="password" id="password">
                    </div>
                </div>
                <div class="card-action row">
                    <div class="input-field col s6">
                        <input id="c2" type="checkbox" name="remember" checked>
                        <label for="c2"> Se souvenir de moi</label>
                    </div>
                    <div class="input-field col s6">
                        <button class="btn-large" type="submit">Se connecter</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="col l4 offset-l4 m8 offset-m2 s12 center">
            <p>
                Vous n'avez pas encore de compte? Alors <a href="{{ Url::to('auth/register') }}">inscrivez-vous</a>!
            </p>
        </div>
    </div>
</div>
@stop
