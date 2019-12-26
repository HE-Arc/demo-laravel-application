<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isSet($pageTitle) ? $pageTitle : trans('message.Untitled Page') }}</title>
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/app.css") }}">
@show
</head>
<body>
    <nav>
        <div class="nav-wrapper container">
            <h1><a href="{{ route('index', compact('lang')) }}" class="brand-logo">Demo</a></h1>
            <ul id="nav-mobile" class="right">
                <li>
                    <a href="#" class="dropdown-button btn" data-activates="dd">{{ trans('messages.' . $lang) }}</a>
                    <ul class="dropdown-content" id="dd">
                    @foreach (['en', 'fr', 'de'] as $ln)
                        <li><a href="{{ route('index', ['lang' => $ln]) }}">
                            {{ trans('messages.' . $ln) }}
                        </a></li>
                    @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('body')
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l4 s12">
                    <h2 class="h5 header">{{ trans('messages.About us') }}</h2>
                    <ul>
                        <li><a href="https://github.com/HE-Arc/demo-laravel-application">{{ trans('messages.Source code') }}</a></li>
                        <li><a href="https://github.com/HE-Arc/demo-laravel-application/issues/new">{{ trans('messages.Report a problem') }}</a></li>
                    </ul>
                </div>
                <div class="col l4 s12">
                    <h2 class="h5 header">{{ trans('messages.Powered by') }}</h2>
                    <ul>
                        <li><a href="http://materializecss.com/">Materialize</a></li>
                        <li><a href="http://laravel.com/">Laravel</a></li>
                        <li><a href="https://www.google.com/design/icons/">Material icons</a></li>
                    </ul>
                </div>
                <div class="col l4 s12">
                    <h2 class="h5 header">{{ trans('messages.Resources') }}</h2>
                    <ul>
                        <li><a href="https://developer.mozilla.org/">Mozilla Developer Network</a></li>
                        <li><a href="http://caniuse.com/">Can I Use?</a></li>
                        <li><a href="http://www.frontendhandbook.com/">Front-end Developer Handbook</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container right-align">
                © {{ trans('messages.copyright', ['year' => '2015 - 2020']) }}
            </div>
        </div>
    </footer>
@section('scripts')
    <script type="text/javascript" src="{{ asset("js/app.js") }}"></script>
@show
</body>
</html>
