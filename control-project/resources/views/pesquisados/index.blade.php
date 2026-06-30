@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] font-semibold" style="color: #d4af37;">Pesquisados</p>
                <h2 class="text-2xl font-semibold text-white">Cadastro de pesquisados</h2>
            </div>
            <a href="{{ route('pesquisados.create') }}" class="inline-flex items-center justify-center rounded-2xl px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90" style="background-color: #d4af37;">Novo pesquisado</a>
        </div>

        <div class="overflow-hidden rounded-3xl border shadow-sm" style="background-color: #2a2a2a; border-color: #444444;">
            <table class="min-w-full text-sm">
                <thead style="background-color: #3a3a3a;">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">ID</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Nome</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Documento</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Tipo</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Ações</th>
                    </tr>
                </thead>
                <tbody style="background-color: #2a2a2a;" class="divide-y" style="border-color: #444444;">
                    @forelse($pesquisados as $pesquisado)
                        <tr>
                            <td class="px-4 py-4 text-gray-300">{{ $pesquisado->id }}</td>
                            <td class="px-4 py-4 text-gray-300">{{ $pesquisado->nome }}</td>
                            <td class="px-4 py-4 text-gray-300">{{ $pesquisado->documento }}</td>
                            <td class="px-4 py-4 text-gray-300">{{ $pesquisado->tipo_de_pesquisado }}</td>
                            <td class="px-4 py-4">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('pesquisados.edit', $pesquisado) }}" class="rounded-full border px-3 py-1 text-xs font-medium hover:opacity-80" style="background-color: #3a3a3a; border-color: #444444; color: #d4af37;">Editar</a>
                                    <form action="{{ route('pesquisados.destroy', $pesquisado) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este pesquisado?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-full px-3 py-1 text-xs font-medium text-white hover:opacity-80" style="background-color: #d4af37;">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">Ainda não há pesquisados cadastrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
