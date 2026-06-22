<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ $title ?? config('app.name', 'Dashboard Syard') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-900">
        <div class="min-h-screen flex flex-col">
            <header class="bg-white border-b border-slate-200 shadow-sm">
                <div class="mx-auto flex flex-col gap-4 px-4 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-orange-600 font-semibold">Syard</p>
                        <h1 class="mt-1 text-2xl font-semibold text-slate-900">{{ $title ?? 'Dashboard' }}</h1>
                    </div>
                    <nav class="flex flex-wrap items-center gap-3 text-sm font-medium text-slate-600">
                        <a href="{{ route('dashboard') }}" class="rounded-md px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('dashboard') ? 'text-orange-600 font-semibold' : 'text-slate-600' }}">Dashboard</a>
                        <a href="{{ route('empresas.index') }}" class="rounded-md px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('empresas.*') ? 'text-orange-600 font-semibold' : 'text-slate-600' }}">Empresas</a>
                        <a href="{{ route('solicitantes.index') }}" class="rounded-md px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('solicitantes.*') ? 'text-orange-600 font-semibold' : 'text-slate-600' }}">Solicitantes</a>
                        <a href="{{ route('pesquisados.index') }}" class="rounded-md px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('pesquisados.*') ? 'text-orange-600 font-semibold' : 'text-slate-600' }}">Pesquisados</a>
                        <a href="{{ route('casos.index') }}" class="rounded-md px-3 py-2 hover:bg-slate-100 {{ request()->routeIs('casos.*') ? 'text-orange-600 font-semibold' : 'text-slate-600' }}">Casos</a>
                    </nav>
                </div>
            </header>

            <main class="flex-1 bg-slate-50">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    @if(session('success'))
                        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900 shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
