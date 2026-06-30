@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] font-semibold" style="color: #d4af37;">Editar pesquisado</p>
                <h2 class="text-2xl font-semibold text-white">Atualizar dados do pesquisado</h2>
            </div>
            <a href="{{ route('pesquisados.index') }}" class="text-sm font-medium hover:opacity-80" style="color: #d4af37;">Voltar à lista</a>
        </div>

        <div class="rounded-3xl border p-6 shadow-sm" style="background-color: #2a2a2a; border-color: #444444;">
            <form action="{{ route('pesquisados.update', $pesquisado) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                @include('pesquisados._form')
                <div class="flex items-center gap-3">
                    <button type="submit" class="inline-flex items-center justify-center rounded-2xl px-5 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90" style="background-color: #d4af37;">Salvar alterações</button>
                    <a href="{{ route('pesquisados.index') }}" class="text-sm font-medium hover:opacity-80" style="color: #d4af37;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
