@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] font-semibold" style="color: #d4af37;">Casos</p>
                <h2 class="text-2xl font-semibold text-white">Lista de casos</h2>
            </div>
            <a href="{{ route('casos.create') }}" class="inline-flex items-center justify-center rounded-2xl px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90" style="background-color: #d4af37;">Novo caso</a>
        </div>

        <div class="overflow-hidden rounded-3xl border shadow-sm" style="background-color: #2a2a2a; border-color: #444444;">
            <table class="min-w-full text-sm">
                <thead style="background-color: #3a3a3a;">
                    <tr>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">ID</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Solicitante</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Pesquisado</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Tipo de caso</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Abertura</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Finalizado</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Procedimentos</th>
                        <th class="px-4 py-3 text-left font-medium text-gray-300">Ações</th>
                    </tr>
                </thead>
                <tbody style="background-color: #2a2a2a;" class="divide-y" style="border-color: #444444;">
                    @forelse($casos as $caso)
                        <tr>
                            <td class="px-4 py-4 text-gray-300">{{ $caso->id }}</td>
                            <td class="px-4 py-4 text-gray-300">{{ $caso->solicitante->nome ?? '—' }}</td>
                            <td class="px-4 py-4 text-gray-300">{{ $caso->pesquisado->nome ?? '—' }}</td>
                            <td class="px-4 py-4 text-gray-300">{{ $caso->tipo_caso }}</td>
                            <td class="px-4 py-4 text-gray-300">{{ $caso->data_abertura->format('d/m/Y') }}</td>
                            <td class="px-4 py-4 text-gray-300">{{ $caso->data_finalizado ? $caso->data_finalizado->format('d/m/Y') : 'Em andamento' }}</td>
                            <td class="px-4 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @php
                                        $procs = [
                                            'entrevista'     => 'Entrevista',
                                            'copia_hd'       => 'Cópia HD',
                                            'copia_celular'  => 'Cópia Celular',
                                            'monitoramento'  => 'Monitoramento',
                                            'pesquisa_campo' => 'Campo',
                                        ];
                                    @endphp
                                    @foreach($procs as $field => $label)
                                        @if($caso->$field)
                                            <span class="rounded-full px-2 py-0.5 text-xs font-medium" style="background-color: #d4af3722; color: #d4af37; border: 1px solid #d4af3755;">{{ $label }}</span>
                                        @endif
                                    @endforeach
                                    @if(!collect(array_keys($procs))->contains(fn($f) => $caso->$f))
                                        <span class="text-xs text-gray-500">—</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('casos.edit', $caso) }}" class="rounded-full border px-3 py-1 text-xs font-medium hover:opacity-80" style="background-color: #3a3a3a; border-color: #444444; color: #d4af37;">Editar</a>
                                    <form action="{{ route('casos.destroy', $caso) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este caso?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-full px-3 py-1 text-xs font-medium text-white hover:opacity-80" style="background-color: #d4af37;">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-8 text-center text-gray-500">Ainda não há casos cadastrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
