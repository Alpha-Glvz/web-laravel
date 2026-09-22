@extends('layouts.app')

@section('title', 'Usuarios · '.config('app.name'))

@section('content')
    <div class="panel">
        <div class="panel-toolbar">
            <div>
                <h1>Usuarios</h1>
                <p class="lead" style="margin-bottom:0;">Altas internas. El registro público está cerrado.</p>
            </div>
            <a href="{{ route('users.create') }}" class="btn-primary">Dar de alta</a>
        </div>

        @if (session('status'))
            <div class="flash">{{ session('status') }}</div>
        @endif

        <table class="data-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->label() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay usuarios.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
