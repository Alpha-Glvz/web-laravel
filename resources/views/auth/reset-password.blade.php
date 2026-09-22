@extends('layouts.guest')

@section('title', 'Nueva contraseña · '.config('app.name'))

@section('content')
    <div class="auth-shell">
        <div class="auth-card">
            <h1>Nueva contraseña</h1>
            <p class="hint">Elige una contraseña nueva para tu cuenta.</p>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="field">
                    <label for="email">Correo</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required>
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

                <button type="submit" class="btn-primary" style="width:100%;text-align:center;">Guardar contraseña</button>
            </form>
        </div>
    </div>
@endsection
