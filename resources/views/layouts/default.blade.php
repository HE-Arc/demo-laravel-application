<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token()  }}">
    <title>{{ isSet($pageTitle) ? $pageTitle : 'Sans titre' }}</title>
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/app.css") }}">
@show
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <a href="{{ URL::to("/") }}" class="brand-logo center">Demo</a>
        </div>
    </nav>

    <main>
        @yield('body')
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col s4">
                    <h2 class="h5 header">Liens</h2>
                    <ul>
                        <li><a href="https://github.com/HE-Arc/demo-laravel-application">Code source</a></li>
                        <li><a href="https://github.com/HE-Arc/demo-laravel-application/issues/new">Reporter un problème</a></li>
                    </ul>
                </div>
                <div class="col s4">
                    <h2 class="h5 header">Outils</h2>
                    <ul>
                        <li><a href="http://materializecss.com/">Materialize</a></li>
                        <li><a href="http://laravel.com/">Laravel</a></li>
                        <li><a href="https://www.google.com/design/icons/">Material icons</a></li>
                    </ul>
                </div>
                <div class="col s4">
                    <h2 class="h5 header">Ressources</h2>
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
                © 2015 copyright HE-ARC
            </div>
        </div>
    </footer>
@section('scripts')
    <script type="text/javascript" src="{{ asset("js/app.js") }}"></script>
@show
</body>
</html>
