@extends('layouts.default', ['pageTitle' => 'Se connecter'])

@section('body')
<form method="POST" action="{{ URL::to('auth/login') }}">
    {!! csrf_field() !!}

    <div>
        <label>Nom d'utilisateur ou e-mail
        <input type="text" name="username" value="{{ old('email') }}"></label>
    </div>

    <div>
        <label>Mot de passe
        <input type="password" name="password" id="password"></label>
    </div>

    <div>
        <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
    </div>

    <div>
        <button type="submit">Se connecter</button>
    </div>
</form>
<p>
    <a href="{{ Url::to('auth/register') }}">S'inscrire</a>
</p>
@stop
