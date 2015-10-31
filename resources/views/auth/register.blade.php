@extends('layouts.default', ['pageTitle' => 'Se connecter'])

@section('body')
<div class="row">
    <form class="col l4 offset-l4 s12" method="POST" action="{{ URL::to('auth/register') }}">
        {!! csrf_field() !!}
        <h1 class="h2 header center">Nouveau compte</h1>

        <div class="card">
            <div class="card-content row">
                <div class="input-field col s12">
                    <label for="c0">Nom d'utilisateur</label>
                    <input id="c0" type="text" name="username" value="{{ old('username') }}">
                </div>
                <div class="input-field col s12">
                    <label for="c1">Courriel</label>
                    <input id="c1" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="input-field col s12">
                    <label for="c2">Mot de passe</label>
                    <input id="c2" type="password" name="password">
                </div>
                <div class="input-field col s12">
                    <label for="c3">Confirmation du mot de passe</label>
                    <input id="c3" type="password" name="password_confirmation">
                </div>
            </div>
            <div class="card-action row">
                <div class="input-field col s6">
                    <input id="c4" type="checkbox" name="accept">
                    <label for="c4"> J'accepte les conditions.</label>
                </div>
                <div class="input-field col s6">
                    <button class="btn-large" type="submit">S'inscrire</button>
                </div>
            </div>
        </div>
    </form>
    <div class="col l4 offset-l4 s12 center">
        <p>
            Vous possèdez déjà un compte et désirez <a href="{{ Url::to('auth/login') }}">vous connecter</a>.
        </p>
    </div>
@stop
