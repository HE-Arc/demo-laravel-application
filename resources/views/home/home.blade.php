@extends('layouts.default', ['pageTitle' => 'Salut ' . Auth::user()->username])

@section('body')
<div class="container">
    <div class="row center">
        <div class="col s12">
            <h1>{{ Auth::user()->username }}</h1>
            <p>
                <a class="btn-large waves-effect waves-light" href="{{ URL::to("auth/logout") }}">Se déconnecter</a>
            </p>
        </div>
    </div>
</div>
@stop
