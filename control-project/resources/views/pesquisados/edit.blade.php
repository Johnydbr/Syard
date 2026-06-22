@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-orange-600">Editar pesquisado</p>
                <h2 class="text-2xl font-semibold text-slate-900">Atualizar dados do pesquisado</h2>
            </div>
            <a href="{{ route('pesquisados.index') }}" class="text-sm font-medium text-slate-600 hover:text-orange-600">Voltar à lista</a>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <form action="{{ route('pesquisados.update', $pesquisado) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                @include('pesquisados._form')
                <div class="flex items-center gap-3">
                    <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-orange-600 px-5 py-2 text-sm font-semibold text-white hover:bg-orange-700">Salvar alterações</button>
                    <a href="{{ route('pesquisados.index') }}" class="text-sm font-medium text-slate-600 hover:text-orange-600">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
