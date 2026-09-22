@extends('layouts.guest')

@section('title', config('app.name').' · Bienvenido')

@section('content')
    <main class="hero">
        <div>
            <div class="status-line">
                <span class="pulse"></span>
                <span id="clock">Sistema en línea</span>
            </div>

            <h1>Bienvenido al {{ config('app.name') }}</h1>

            <p class="lead">
                Un solo panel para administrar tus operaciones, dar seguimiento a tus procesos
                y mantener el control de la información de ISEL.
            </p>

            <div style="display:flex;gap:18px;flex-wrap:wrap;">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-primary" style="padding:13px 26px;">Entrar al sistema</a>
                @else
                    <a href="{{ route('login') }}" class="btn-primary" style="padding:13px 26px;">Entrar al sistema</a>
                @endauth
            </div>
        </div>

        <div class="schematic-wrap">
            <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect x="30" y="30" width="340" height="340" class="schem-line soft" style="animation-delay:0s;" />
                <circle cx="200" cy="200" r="46" class="schem-line" style="animation-delay:0.15s;" />
                <circle cx="200" cy="200" r="10" class="schem-node signal" style="animation-delay:1.6s;" />
                <path d="M200,154 L200,70" class="schem-line" style="animation-delay:0.5s;" />
                <path d="M246,200 L330,200" class="schem-line" style="animation-delay:0.7s;" />
                <path d="M200,246 L200,330" class="schem-line" style="animation-delay:0.9s;" />
                <path d="M154,200 L70,200" class="schem-line" style="animation-delay:1.1s;" />
                <circle cx="200" cy="70" r="7" class="schem-node" style="animation-delay:1.3s;" />
                <circle cx="330" cy="200" r="7" class="schem-node" style="animation-delay:1.5s;" />
                <circle cx="200" cy="330" r="7" class="schem-node" style="animation-delay:1.7s;" />
                <circle cx="70" cy="200" r="7" class="schem-node" style="animation-delay:1.9s;" />
                <path d="M232,168 L280,120" class="schem-line soft" style="animation-delay:1.2s;" />
                <path d="M232,232 L280,280" class="schem-line soft" style="animation-delay:1.4s;" />
                <path d="M168,232 L120,280" class="schem-line soft" style="animation-delay:1.6s;" />
                <path d="M168,168 L120,120" class="schem-line soft" style="animation-delay:1.8s;" />
            </svg>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        (function () {
            const el = document.getElementById('clock');
            if (!el) return;

            function pad(n) { return n.toString().padStart(2, '0'); }

            function tick() {
                const now = new Date();
                const time = `${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
                try {
                    const date = new Intl.DateTimeFormat('es-MX', {
                        day: '2-digit', month: 'short'
                    }).format(now);
                    el.textContent = `Sistema en línea · ${date} · ${time}`;
                } catch (e) {
                    el.textContent = `Sistema en línea · ${time}`;
                }
            }

            tick();
            setInterval(tick, 1000);
        })();
    </script>
@endpush
