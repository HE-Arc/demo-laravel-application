@extends('layouts.default', ['pageTitle' => 'Vote'])

@section('body')
<div class="container">
    <div class="row center">
        <form class="col s12" method="POST" action="{{ route('vote', compact('lang')) }}">
            {{ csrf_field() }}
            <h1>Salut {{ Auth::user()->username }}!</h1>
            <div class="row">
                <p class="col m6 s12">
                    <img class="responsive-img" src="http://lorempixel.com/600/400/" alt="">
                </p>
                <div class="col m6 s12">
                    <p>
                        <input type="radio" name="vote" value="1" id="c1">
                        <label for="c1">★☆☆☆☆</label>
                    </p>
                    <p>
                        <input type="radio" name="vote" value="2" id="c2">
                        <label for="c2">★★☆☆☆</label>
                    </p>
                    <p>
                        <input type="radio" name="vote" value="3" id="c3">
                        <label for="c3">★★★☆☆</label>
                    </p>
                    <p>
                        <input type="radio" name="vote" value="4" id="c4">
                        <label for="c4">★★★★☆</label>
                    </p>
                    <p>
                        <input type="radio" name="vote" value="5" id="c5">
                        <label for="c5">★★★★★</label>
                    </p>
                </div>
                <p class="col s12 center">
                    <button class="btn-large" type="submit">{{ trans('messages.Vote') }}</button>
                </p>
            </div>
        </div>
    </div>
</div>
@stop
