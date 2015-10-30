<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>{{ isSet($pageTitle) ? $pageTitle : 'Sans titre' }}</title>
</head>
<body>
    <h1>{{ isSet($pageTitle) ? $pageTitle : 'Sans titre' }}</h1>

@if (count($errors))
    <h2>Erreurs</h2>
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

    @yield('body')
</body>
</html>
