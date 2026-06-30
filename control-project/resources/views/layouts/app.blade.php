<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ $title ?? config('app.name', 'Syard Case') }}</title>
        <link rel="icon" type="image/svg+xml" href="/images/favicon.svg">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body style="background-color: #1a1a1a;" class="min-h-screen text-white">
        <div class="min-h-screen flex flex-col">
            <header style="background-color: #2b2b2b; border-color: #444444;" class="border-b shadow-sm">
                <div class="mx-auto flex flex-col gap-4 px-4 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex items-center gap-4">
                        <img src="/images/backgrounds/logo-background.png" alt="Logo Syard" class="h-16 w-auto">
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] font-semibold" style="color: #d4af37;">Syard</p>
                            <h1 class="mt-1 text-2xl font-semibold text-white">{{ $title ?? 'Dashboard' }}</h1>
                        </div>
                    </div>
                    <nav style="color: #d9d9d9;" class="flex flex-wrap items-center gap-3 text-sm font-medium">
                        <a href="{{ route('dashboard') }}" style="color: {{ request()->routeIs('dashboard') ? '#d4af37' : '#d9d9d9' }};" class="rounded-md px-3 py-2 hover:bg-slate-700">Dashboard</a>
                        <a href="{{ route('empresas.index') }}" style="color: {{ request()->routeIs('empresas.*') ? '#d4af37' : '#d9d9d9' }};" class="rounded-md px-3 py-2 hover:bg-slate-700">Empresas</a>
                        <a href="{{ route('solicitantes.index') }}" style="color: {{ request()->routeIs('solicitantes.*') ? '#d4af37' : '#d9d9d9' }};" class="rounded-md px-3 py-2 hover:bg-slate-700">Solicitantes</a>
                        <a href="{{ route('pesquisados.index') }}" style="color: {{ request()->routeIs('pesquisados.*') ? '#d4af37' : '#d9d9d9' }};" class="rounded-md px-3 py-2 hover:bg-slate-700">Pesquisados</a>
                        <a href="{{ route('casos.index') }}" style="color: {{ request()->routeIs('casos.*') ? '#d4af37' : '#d9d9d9' }};" class="rounded-md px-3 py-2 hover:bg-slate-700">Casos</a>
                        @auth
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.index') }}" style="color: {{ request()->routeIs('admin.*') ? '#d4af37' : '#d9d9d9' }};" class="rounded-md px-3 py-2 hover:bg-slate-700">Admin</a>
                            @endif
                        @endauth
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-slate-700" style="color: #d4af37;">Sair</button>
                        </form>
                    </nav>
                </div>
            </header>

            <main style="background-color: #1a1a1a;" class="flex-1">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    @if(session('success'))
                        <div class="mb-6 rounded-xl border p-4 text-sm shadow-sm" style="border-color: #4ade80; background-color: #1b3a1b; color: #86efac;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
