@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <section class="rounded-3xl p-6 shadow-sm border" style="background-color: #2a2a2a; border-color: #444444;">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.3em]" style="color: #d4af37;">Financial KPI Dashboard</p>
                    <h2 class="mt-2 text-3xl font-semibold text-white">Visão geral do controle</h2>
                    <p class="mt-2 text-sm text-gray-300">Painel atualizado com os principais indicadores de empresas, solicitantes, pesquisados e casos.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('casos.create') }}" class="inline-flex items-center justify-center rounded-2xl px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90" style="background-color: #d4af37;">Novo caso</a>
                </div>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-3xl border p-5 shadow-sm" style="background-color: #1b1b1b; border-color: #444444;">
                    <p class="text-sm font-medium text-gray-300">Empresas</p>
                    <p class="mt-4 text-3xl font-semibold text-white">{{ $totalEmpresas }}</p>
                </div>
                <div class="rounded-3xl border p-5 shadow-sm" style="background-color: #1b1b1b; border-color: #444444;">
                    <p class="text-sm font-medium text-gray-300">Solicitantes</p>
                    <p class="mt-4 text-3xl font-semibold text-white">{{ $totalSolicitantes }}</p>
                </div>
                <div class="rounded-3xl border p-5 shadow-sm" style="background-color: #1b1b1b; border-color: #444444;">
                    <p class="text-sm font-medium text-gray-300">Pesquisados</p>
                    <p class="mt-4 text-3xl font-semibold text-white">{{ $totalPesquisados }}</p>
                </div>
                <div class="rounded-3xl border p-5 shadow-sm" style="background-color: #1b1b1b; border-color: #444444;">
                    <p class="text-sm font-medium text-gray-300">Casos</p>
                    <p class="mt-4 text-3xl font-semibold text-white">{{ $totalCasos }}</p>
                </div>
            </div>
        </section>

        <section class="rounded-3xl p-6 shadow-sm border" style="background-color: #2a2a2a; border-color: #444444;">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-white">Casos recentes</h3>
                    <p class="mt-1 text-sm text-gray-300">Últimos casos adicionados ao sistema.</p>
                </div>
                <a href="{{ route('casos.index') }}" class="text-sm font-medium hover:opacity-80" style="color: #d4af37;">Ver todos os casos</a>
            </div>

            <div class="mt-6 overflow-hidden rounded-3xl border" style="border-color: #444444;">
                <table class="min-w-full border-separate border-spacing-0 text-sm">
                    <thead style="background-color: #3a3a3a;">
                        <tr>
                            <th class="px-4 py-3 text-left font-medium text-gray-300">ID</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-300">Empresa</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-300">Solicitante</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-300">E-mail</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-300">Contato</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-300">Pesquisado</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-300">Caso</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-300">Abertura</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-300">Finalizado</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #1b1b1b;" class="divide-y">
                        @forelse($recentCases as $caso)
                            <tr>
                                <td class="px-4 py-4 ">{{ $caso->id }}</td>
                                <td class="px-4 py-4 ">{{ $caso->solicitante->empresaSolicitante->razao_social ?? '—' }}</td>
                                <td class="px-4 py-4 ">{{ $caso->solicitante->nome }}</td>
                                <td class="px-4 py-4 ">{{ $caso->solicitante->email ?? '—' }}</td>
                                <td class="px-4 py-4 ">{{ $caso->solicitante->contato ?? '—' }}</td>
                                <td class="px-4 py-4 ">{{ $caso->pesquisado->nome }}</td>
                                <td class="px-4 py-4 ">{{ $caso->tipo_caso }}</td>
                                <td class="px-4 py-4 ">{{ $caso->data_abertura->format('d/m/Y') }}</td>
                                <td class="px-4 py-4 ">{{ $caso->data_finalizado ? $caso->data_finalizado->format('d/m/Y') : 'Em andamento' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-8 text-center text-slate-500">Nenhum caso recente encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
