<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="grid-bg"></div>

    <header class="topbar">
        <a href="{{ route('home') }}" class="brand">
            <span class="dot"></span>
            {{ config('app.name') }}
        </a>
        <nav>
            @auth
                <a href="{{ route('dashboard') }}" class="btn-primary">Ir al panel</a>
            @else
                <a href="{{ route('login') }}" class="btn-ghost">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="btn-primary">Crear cuenta</a>
            @endauth
        </nav>
    </header>

    @yield('content')

    <footer class="site-footer">
        <span>© {{ date('Y') }} {{ config('app.name') }} — Todos los derechos reservados.</span>
        <span class="env">v{{ config('app.version') }}</span>
    </footer>

    @stack('scripts')
</body>
</html>
