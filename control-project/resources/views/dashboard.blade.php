@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <section class="rounded-3xl bg-white p-6 shadow-sm border border-slate-200">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.3em] text-orange-600">Financial KPI Dashboard</p>
                    <h2 class="mt-2 text-3xl font-semibold text-slate-900">Visão geral do controle</h2>
                    <p class="mt-2 text-sm text-slate-600">Painel atualizado com os principais indicadores de empresas, solicitantes, pesquisados e casos.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('casos.create') }}" class="inline-flex items-center justify-center rounded-2xl bg-orange-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-700">Novo caso</a>
                </div>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Empresas</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalEmpresas }}</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Solicitantes</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalSolicitantes }}</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Pesquisados</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalPesquisados }}</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Casos</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalCasos }}</p>
                </div>
            </div>
        </section>

        <section class="rounded-3xl bg-white p-6 shadow-sm border border-slate-200">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-slate-900">Casos recentes</h3>
                    <p class="mt-1 text-sm text-slate-500">Últimos casos adicionados ao sistema.</p>
                </div>
                <a href="{{ route('casos.index') }}" class="text-sm font-medium text-orange-600 hover:text-orange-700">Ver todos os casos</a>
            </div>

            <div class="mt-6 overflow-hidden rounded-3xl border border-slate-200">
                <table class="min-w-full border-separate border-spacing-0 text-sm">
                    <thead class="bg-slate-100 text-slate-600">
                        <tr>
                            <th class="px-4 py-3 text-left font-medium">ID</th>
                            <th class="px-4 py-3 text-left font-medium">Empresa</th>
                            <th class="px-4 py-3 text-left font-medium">Solicitante</th>
                            <th class="px-4 py-3 text-left font-medium">Pesquisado</th>
                            <th class="px-4 py-3 text-left font-medium">Caso</th>
                            <th class="px-4 py-3 text-left font-medium">Abertura</th>
                            <th class="px-4 py-3 text-left font-medium">Finalizado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse($recentCases as $caso)
                            <tr>
                                <td class="px-4 py-4 text-slate-700">{{ $caso->id }}</td>
                                <td class="px-4 py-4 text-slate-700">{{ $caso->solicitante->empresaSolicitante->razao_social ?? '—' }}</td>
                                <td class="px-4 py-4 text-slate-700">{{ $caso->solicitante->nome }}</td>
                                <td class="px-4 py-4 text-slate-700">{{ $caso->pesquisado->nome }}</td>
                                <td class="px-4 py-4 text-slate-700">{{ $caso->tipo_caso }}</td>
                                <td class="px-4 py-4 text-slate-700">{{ $caso->data_abertura->format('d/m/Y') }}</td>
                                <td class="px-4 py-4 text-slate-700">{{ $caso->data_finalizado ? $caso->data_finalizado->format('d/m/Y') : 'Em andamento' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-slate-500">Nenhum caso recente encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
