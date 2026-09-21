<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sistema') }} · Bienvenido</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #0E1A2B;
            --bg-panel: #142338;
            --line: #26374F;
            --line-soft: #1B2C43;
            --accent: #4FA3B8;
            --accent-dim: #2E5A66;
            --signal: #E8A33D;
            --text: #E7ECF3;
            --text-muted: #8C9AB3;
            --radius: 3px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            height: 100%;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', -apple-system, sans-serif;
            line-height: 1.5;
            overflow-x: hidden;
            position: relative;
        }

        /* Fondo de retícula tipo plano técnico */
        .grid-bg {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(var(--line-soft) 1px, transparent 1px),
                linear-gradient(90deg, var(--line-soft) 1px, transparent 1px);
            background-size: 56px 56px;
            mask-image: radial-gradient(ellipse 90% 70% at 30% 20%, black 0%, transparent 75%);
            -webkit-mask-image: radial-gradient(ellipse 90% 70% at 30% 20%, black 0%, transparent 75%);
            pointer-events: none;
            z-index: 0;
        }

        .topbar {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 28px 48px;
            border-bottom: 1px solid var(--line);
        }

        .brand {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            font-size: 1.15rem;
            letter-spacing: 0.01em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-dim);
        }

        .topbar nav {
            display: flex;
            gap: 12px;
        }

        .btn-ghost, .btn-primary {
            font-family: 'Inter', sans-serif;
            font-size: 0.92rem;
            font-weight: 500;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: var(--radius);
            transition: background 0.15s ease, border-color 0.15s ease, transform 0.1s ease;
            display: inline-block;
        }

        .btn-ghost {
            color: var(--text);
            border: 1px solid var(--line);
        }
        .btn-ghost:hover { border-color: var(--accent); }

        .btn-primary {
            background: var(--accent);
            color: #06141F;
            font-weight: 600;
            border: 1px solid var(--accent);
        }
        .btn-primary:hover { background: #5FB3C7; }
        .btn-primary:active { transform: translateY(1px); }

        .hero {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 48px;
            max-width: 1180px;
            margin: 0 auto;
            padding: 96px 48px 64px;
            min-height: 78vh;
        }

        .status-line {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.8rem;
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 28px;
            padding: 6px 12px;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            background: var(--bg-panel);
        }

        .status-line .pulse {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--signal);
            animation: pulse 2.4s ease-in-out infinite;
            flex-shrink: 0;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.35; }
        }

        h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            font-size: clamp(2.4rem, 4.4vw, 3.6rem);
            line-height: 1.08;
            letter-spacing: -0.01em;
            max-width: 14ch;
            margin-bottom: 22px;
        }

        .lead {
            color: var(--text-muted);
            font-size: 1.05rem;
            max-width: 46ch;
            margin-bottom: 36px;
        }

        .cta-row {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .cta-row .btn-primary {
            padding: 13px 26px;
            font-size: 0.98rem;
        }

        /* Panel de esquema técnico animado */
        .schematic-wrap {
            position: relative;
            aspect-ratio: 1 / 1;
            max-width: 460px;
            justify-self: center;
        }

        .schematic-wrap svg {
            width: 100%;
            height: 100%;
        }

        .schem-line {
            fill: none;
            stroke: var(--accent);
            stroke-width: 1.4;
            stroke-linecap: round;
            stroke-dasharray: 600;
            stroke-dashoffset: 600;
            animation: draw 2.4s ease forwards;
        }

        .schem-line.soft { stroke: var(--line); }
        .schem-node { fill: var(--bg); stroke: var(--accent); stroke-width: 1.4; opacity: 0; animation: fadeIn 0.6s ease forwards; }
        .schem-node.signal { stroke: var(--signal); }

        @keyframes draw {
            to { stroke-dashoffset: 0; }
        }
        @keyframes fadeIn {
            to { opacity: 1; }
        }

        footer {
            position: relative;
            z-index: 2;
            border-top: 1px solid var(--line);
            padding: 22px 48px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.82rem;
            color: var(--text-muted);
        }

        footer .env {
            font-family: 'IBM Plex Mono', monospace;
        }

        @media (max-width: 860px) {
            .hero {
                grid-template-columns: 1fr;
                padding: 64px 24px 48px;
                text-align: left;
            }
            .schematic-wrap { max-width: 320px; margin-top: 24px; }
            .topbar { padding: 22px 24px; }
            footer { padding: 20px 24px; flex-direction: column; gap: 8px; align-items: flex-start; }
        }

        @media (prefers-reduced-motion: reduce) {
            .schem-line, .schem-node, .status-line .pulse {
                animation: none !important;
                stroke-dashoffset: 0 !important;
                opacity: 1 !important;
            }
        }

        a:focus-visible, button:focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 2px;
        }
    </style>
</head>
<body>

    <div class="grid-bg"></div>

    <header class="topbar">
        <div class="brand">
            <span class="dot"></span>
            {{ config('app.name', 'Sistema') }}
        </div>
        <nav>
            <a href="{{ url('/dashboard') }}" class="btn-primary">Ir al panel</a>
        </nav>
    </header>

    <main class="hero">
        <div class="hero-left">
            <div class="status-line">
                <span class="pulse"></span>
                <span id="clock">Sistema en línea</span>
            </div>

            <h1>Bienvenido a {{ config('app.name', 'tu sistema') }}</h1>

            <p class="lead">
                Un solo panel para administrar tus operaciones, dar seguimiento a tus procesos
                y mantener el control de la información de tu empresa.
            </p>

            <div class="cta-row">
                <a href="{{ url('/dashboard') }}" class="btn-primary">Entrar al sistema</a>
            </div>
        </div>

        <div class="hero-right">
            <div class="schematic-wrap">
                <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                    <!-- Marco -->
                    <rect x="30" y="30" width="340" height="340" class="schem-line soft" style="animation-delay:0s;" />
                    <!-- Nodo central -->
                    <circle cx="200" cy="200" r="46" class="schem-line" style="animation-delay:0.15s;" />
                    <circle cx="200" cy="200" r="10" class="schem-node signal" style="animation-delay:1.6s;" />
                    <!-- Conexiones -->
                    <path d="M200,154 L200,70" class="schem-line" style="animation-delay:0.5s;" />
                    <path d="M246,200 L330,200" class="schem-line" style="animation-delay:0.7s;" />
                    <path d="M200,246 L200,330" class="schem-line" style="animation-delay:0.9s;" />
                    <path d="M154,200 L70,200" class="schem-line" style="animation-delay:1.1s;" />
                    <!-- Nodos periféricos -->
                    <circle cx="200" cy="70" r="7" class="schem-node" style="animation-delay:1.3s;" />
                    <circle cx="330" cy="200" r="7" class="schem-node" style="animation-delay:1.5s;" />
                    <circle cx="200" cy="330" r="7" class="schem-node" style="animation-delay:1.7s;" />
                    <circle cx="70" cy="200" r="7" class="schem-node" style="animation-delay:1.9s;" />
                    <!-- Diagonales suaves -->
                    <path d="M232,168 L280,120" class="schem-line soft" style="animation-delay:1.2s;" />
                    <path d="M232,232 L280,280" class="schem-line soft" style="animation-delay:1.4s;" />
                    <path d="M168,232 L120,280" class="schem-line soft" style="animation-delay:1.6s;" />
                    <path d="M168,168 L120,120" class="schem-line soft" style="animation-delay:1.8s;" />
                </svg>
            </div>
        </div>
    </main>

    <footer>
        <span>© {{ date('Y') }} {{ config('app.name', 'Sistema') }} — Todos los derechos reservados.</span>
        <span class="env">v{{ config('app.version', '1.0.0') }}</span>
    </footer>

    <script>
        // Reloj de estado en vivo, con degradación silenciosa si el navegador
        // no soporta Intl.DateTimeFormat con las opciones usadas.
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

</body>
</html>