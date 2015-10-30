@extends('layouts.default', ['pageTitle' => 'Salut ' . Auth::user()->username])

@section('body')
<p>
    <a href="{{ URL::to("auth/logout") }}">Se déconnecter</a>
</p>
@stop
