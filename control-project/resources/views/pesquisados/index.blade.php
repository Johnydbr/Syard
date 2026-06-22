@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-orange-600">Pesquisados</p>
                <h2 class="text-2xl font-semibold text-slate-900">Cadastro de pesquisados</h2>
            </div>
            <a href="{{ route('pesquisados.create') }}" class="inline-flex items-center justify-center rounded-2xl bg-orange-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-700">Novo pesquisado</a>
        </div>

        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-600">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium">ID</th>
                        <th class="px-4 py-3 text-left font-medium">Nome</th>
                        <th class="px-4 py-3 text-left font-medium">Documento</th>
                        <th class="px-4 py-3 text-left font-medium">Tipo</th>
                        <th class="px-4 py-3 text-left font-medium">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse($pesquisados as $pesquisado)
                        <tr>
                            <td class="px-4 py-4 text-slate-700">{{ $pesquisado->id }}</td>
                            <td class="px-4 py-4 text-slate-700">{{ $pesquisado->nome }}</td>
                            <td class="px-4 py-4 text-slate-700">{{ $pesquisado->documento }}</td>
                            <td class="px-4 py-4 text-slate-700">{{ $pesquisado->tipo_de_pesquisado }}</td>
                            <td class="px-4 py-4">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('pesquisados.edit', $pesquisado) }}" class="rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700 hover:bg-slate-100">Editar</a>
                                    <form action="{{ route('pesquisados.destroy', $pesquisado) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este pesquisado?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-full bg-red-600 px-3 py-1 text-xs font-medium text-white hover:bg-red-700">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-slate-500">Ainda não há pesquisados cadastrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
