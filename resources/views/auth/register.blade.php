@extends('layouts.guest')

@section('title', 'Crear cuenta · '.config('app.name'))

@section('content')
    <div class="auth-shell">
        <div class="auth-card">
            <h1>Crear cuenta</h1>
            <p class="hint">Regístrate para entrar al portal.</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="email">Correo</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn-primary" style="width:100%;text-align:center;">Registrarme</button>
            </form>

            <div class="auth-links">
                <a href="{{ route('login') }}">Ya tengo cuenta</a>
            </div>
        </div>
    </div>
@endsection
