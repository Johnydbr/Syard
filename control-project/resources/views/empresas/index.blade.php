@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-orange-600">Empresas</p>
                <h2 class="text-2xl font-semibold text-slate-900">Cadastro de empresas solicitantes</h2>
            </div>
            <a href="{{ route('empresas.create') }}" class="inline-flex items-center justify-center rounded-2xl bg-orange-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-700">Nova empresa</a>
        </div>

        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-600">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium">ID</th>
                        <th class="px-4 py-3 text-left font-medium">Razão social</th>
                        <th class="px-4 py-3 text-left font-medium">CNPJ</th>
                        <th class="px-4 py-3 text-left font-medium">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse($empresas as $empresa)
                        <tr>
                            <td class="px-4 py-4 text-slate-700">{{ $empresa->id }}</td>
                            <td class="px-4 py-4 text-slate-700">{{ $empresa->razao_social }}</td>
                            <td class="px-4 py-4 text-slate-700">{{ $empresa->cnpj }}</td>
                            <td class="px-4 py-4">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('empresas.edit', $empresa) }}" class="rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700 hover:bg-slate-100">Editar</a>
                                    <form action="{{ route('empresas.destroy', $empresa) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir esta empresa?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-full bg-red-600 px-3 py-1 text-xs font-medium text-white hover:bg-red-700">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8 text-center text-slate-500">Ainda não há empresas cadastradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
