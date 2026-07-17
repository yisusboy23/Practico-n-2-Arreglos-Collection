<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Aula Virtual')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-700 min-h-screen flex flex-col">
    <!-- Encabezado -->
    <header class="bg-gradient-to-r from-blue-900 to-teal-700 shadow">
        <div class="max-w-7xl mx-auto p-4 flex items-center justify-between flex-wrap gap-4">
            <h1 class="text-xl font-bold text-white">
                @yield('header', 'Aula Virtual')
            </h1>
            <nav class="flex gap-4 text-sm font-medium">
                <a href="{{ route('entregas.filtro') }}"
                   class="px-3 py-1.5 rounded-lg transition {{ request()->routeIs('entregas.filtro') ? 'bg-white text-blue-900' : 'text-white hover:bg-white/10' }}">
                    Filtro de Entregas
                </a>
                <a href="{{ route('reporte') }}"
                   class="px-3 py-1.5 rounded-lg transition {{ request()->routeIs('reporte') ? 'bg-white text-blue-900' : 'text-white hover:bg-white/10' }}">
                    Reporte
                </a>
                <a href="{{ route('ranking') }}"
                   class="px-3 py-1.5 rounded-lg transition {{ request()->routeIs('ranking') ? 'bg-white text-blue-900' : 'text-white hover:bg-white/10' }}">
                    Ranking
                </a>
            </nav>
        </div>
    </header>

    <!-- Contenido -->
    <main class="grow container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Pie de página -->
    <footer class="bg-gray-200 text-center p-4">
        <p class="text-gray-600 text-sm">
            &copy; {{ date('Y') }} Aula Virtual. Todos los derechos reservados.
        </p>
    </footer>
    @stack('scripts')
</body>
</html>