<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <!-- <link rel="stylesheet" href="../../css/app.css"> -->
        <title>Gestor de Tasques</title>
    </head>
    <body class="bodyApp">
        @if (route('treballadors.index') == url()->current())
            <nav class="navbar">
                <a href="{{ route('treballadors.index') }}" class="link">Tots els treballadors</a> |
                <a href="{{ route('treballadors.create') }}" class="link">Nou treballador</a>
            </nav>
        @endif
        @if (route('tasques.index') == url()->current())
            <nav class="navbar">
                <a href="{{ route('tasques.index') }}" class="link">Totes les tasques</a> |
                <a href="{{ route('tasques.create') }}" class="link">Nova tasca</a>
            </nav>
        @endif

        <hr>
        
        <header class="headerGestio">
            <h1 class="titleGestio">CRUD Gestió  de tasques</h1>
        </header>

        <div class="container">
            @yield('content')
        </div>

    </body>
</html>
