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
    <div class="app-shell">
        <header class="topbar">
            <a href="{{ route('dashboard') }}" class="brand">
                <span class="dot"></span>
                {{ config('app.name') }}
            </a>
            <nav style="display:flex;gap:12px;align-items:center;">
                <span style="color:var(--color-muted);font-size:0.9rem;">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-ghost">Cerrar sesión</button>
                </form>
            </nav>
        </header>
        <main class="app-main">
            @yield('content')
        </main>
    </div>
</body>
</html>
