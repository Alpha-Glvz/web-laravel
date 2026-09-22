@extends('layouts.app')

@section('title', 'Dar de alta usuario · '.config('app.name'))

@section('content')
    <div class="panel" style="max-width:520px;">
        <h1>Dar de alta</h1>
        <p class="lead">Crea una cuenta para alguien del equipo.</p>

        <form method="POST" action="{{ route('users.store') }}">
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
                <label for="role">Rol</label>
                <select id="role" name="role" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->value }}" @selected(old('role', $defaultRole->value) === $role->value)>
                            {{ $role->label() }}
                        </option>
                    @endforeach
                </select>
                @error('role')
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

            <div class="panel-toolbar">
                <a href="{{ route('users.index') }}" class="btn-ghost">Cancelar</a>
                <button type="submit" class="btn-primary">Crear usuario</button>
            </div>
        </form>
    </div>
@endsection
