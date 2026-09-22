@extends('layouts.guest')

@section('title', 'Iniciar sesión · '.config('app.name'))

@section('content')
    <div class="auth-shell">
        <div class="auth-card">
            <h1>Iniciar sesión</h1>
            <p class="hint">Accede al panel de {{ config('app.name') }}.</p>

            @if (session('status'))
                <div class="flash">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email">Correo</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <label class="remember">
                    <input type="checkbox" name="remember">
                    Recordarme
                </label>

                <button type="submit" class="btn-primary" style="width:100%;text-align:center;">Entrar</button>
            </form>

            <div class="auth-links">
                <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
                <a href="{{ route('register') }}">Crear cuenta</a>
            </div>
        </div>
    </div>
@endsection
