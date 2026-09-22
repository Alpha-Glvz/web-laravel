@extends('layouts.guest')

@section('title', 'Recuperar contraseña · '.config('app.name'))

@section('content')
    <div class="auth-shell">
        <div class="auth-card">
            <h1>Recuperar contraseña</h1>
            <p class="hint">Te enviaremos un enlace para restablecerla.</p>

            @if (session('status'))
                <div class="flash">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="field">
                    <label for="email">Correo</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-primary" style="width:100%;text-align:center;">Enviar enlace</button>
            </form>

            <div class="auth-links">
                <a href="{{ route('login') }}">Volver a iniciar sesión</a>
            </div>
        </div>
    </div>
@endsection
