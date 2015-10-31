@extends('layouts.default', ['pageTitle' => 'Accueil'])

@section('body')
<div id="index-banner">
    <div class="parallax-container valign-wrapper">
        <div class="parallax" id="unicorn">
            <!--
            Illustration by: Maria Lueur
            https://www.flickr.com/photos/marlasparacosm/9308012354
            -->
            <img src="{{ asset("images/unicorn.jpg") }}" alt="">
        </div>
        <div class="container valign">
            <div class="row center">
                <h1 class="h2 header light center">L'application démo de Laravel qui roxe du poney!</h1>
            </div>
            <div class="row center">
                <p>
                    <a class="btn-large waves-effect waves-light" href="{{ URL::to("auth/register") }}">
                        S'inscrire
                        <i class="mdi-content-add-circle material-icons left"></i>
                    </a>
                    <a class="btn-large waves-effect waves-light"  href="{{ URL::to("auth/login") }}">
                        Se connecter
                        <i class="mdi-action-account-circle material-icons left"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@if (count($users))
<section class="container">
    <div class="row">
        <h2 class="header h4">Nos membres</h2>
        <p class="flow-text">
@foreach($users->all() as $user)
            <span class="chip" title="{{ $user->email }}">{{ $user->username }}</span>
@endforeach
        </p>
    </div>
</section>
@endif
@stop
