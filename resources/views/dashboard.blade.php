@extends('layouts.app')

@section('title', 'Panel · '.config('app.name'))

@section('content')
    <div class="panel">
        <h1>Panel</h1>
        <p class="lead" style="margin-bottom:0;">
            Hola, {{ auth()->user()->name }}. El sistema está listo para conectar módulos de operación de ISEL.
        </p>
    </div>
@endsection
