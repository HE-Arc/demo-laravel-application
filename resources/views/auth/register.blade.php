@extends('layouts.default', ['pageTitle' => 'Se connecter'])

@section('body')
<form method="POST" action="{{ URL::to('auth/register') }}">
    {!! csrf_field() !!}

    <div>
        <label>Nom d'utilisateur
        <input type="text" name="username" value="{{ old('username') }}"></label>
    </div>

    <div>
        <label>Courriel
        <input type="email" name="email" value="{{ old('email') }}"></label>
    </div>

    <div>
        <label>Mot de passe
        <input type="password" name="password"></label>
    </div>

    <div>
        <label>Confirmation du mot de passe
        <input type="password" name="password_confirmation"></label>
    </div>

    <div>
        <button type="submit">S'inscrire</button>
    </div>
</form>
<p>
    <a href="{{ Url::to('auth/login') }}">Se connecter</a>
</p>
@stop
