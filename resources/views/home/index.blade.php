@extends('layouts.default', ['pageTitle' => trans('messages.Homepage')])

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
                <h1 class="h2 header light center">{{ trans('messages.moto') }}</h1>
            </div>
            <div class="row center">
                <p>
                    <a class="btn-large waves-effect waves-light" href="{{ route('sign up', compact('lang')) }}">
                        {{ trans('messages.Sign up') }}
                        <i class="mdi-content-add-circle material-icons left"></i>
                    </a>
                    <a class="btn-large waves-effect waves-light"  href="{{ route('sign in', compact('lang')) }}">
                        {{ trans('messages.Sign in') }}
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
        <div class="col s12">
            <h2 class="header h4">{{ trans_choice('messages.Our members', count($users)) }}</h2>
            <p class="flow-text">
    @foreach($users->all() as $user)
                <span class="chip" title="{{ $user->email }}">{{ $user->username }}</span>
    @endforeach
            </p>
        </div>
    </div>
</section>
@endif
@stop
