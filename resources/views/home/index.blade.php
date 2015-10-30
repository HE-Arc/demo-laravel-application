@extends('layouts.default', ['pageTitle' => 'Accueil'])

@section('body')
<h2>Actions</h2>
<ul>
    <li><a href="{{ URL::to("auth/login") }}">Se connecter</a></li>
    <li><a href="{{ URL::to("auth/register") }}">S'inscrire</a></li>
</ul>
@if (count($users))
<h2>Utilisateurs</h2>
<ul>
@foreach($users->all() as $user)
    <li>{{ $user->username }} &lt;{{ $user->email }}&gt;</li>
@endforeach
</ul>
@endif

@stop
