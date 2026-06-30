<div class="grid gap-6">
    <div class="grid gap-2">
        <label for="solicitante_id" class="text-sm font-medium" style="color: #d9d9d9;">Solicitante</label>
        <select id="solicitante_id" name="solicitante_id" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required>
            <option value="">Selecione o solicitante</option>
            @foreach($solicitantes as $solicitante)
                <option value="{{ $solicitante->id }}" {{ old('solicitante_id', isset($caso) ? $caso->solicitante_id : '') == $solicitante->id ? 'selected' : '' }}>{{ $solicitante->nome }} - {{ $solicitante->empresaSolicitante->razao_social ?? 'Sem empresa' }}</option>
            @endforeach
        </select>
        @error('solicitante_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-2">
        <label for="pesquisado_id" class="text-sm font-medium" style="color: #d9d9d9;">Pesquisado</label>
        <select id="pesquisado_id" name="pesquisado_id" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required>
            <option value="">Selecione o pesquisado</option>
            @foreach($pesquisados as $pesquisado)
                <option value="{{ $pesquisado->id }}" {{ old('pesquisado_id', isset($caso) ? $caso->pesquisado_id : '') == $pesquisado->id ? 'selected' : '' }}>{{ $pesquisado->nome }} - {{ $pesquisado->documento }}</option>
            @endforeach
        </select>
        @error('pesquisado_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-2">
        <label for="tipo_caso" class="text-sm font-medium" style="color: #d9d9d9;">Tipo de caso</label>
        <input id="tipo_caso" name="tipo_caso" value="{{ old('tipo_caso', isset($caso) ? $caso->tipo_caso : '') }}" type="text" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required />
        @error('tipo_caso')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-2 sm:grid-cols-2">
        <div class="grid gap-2">
            <label for="data_abertura" class="text-sm font-medium" style="color: #d9d9d9;">Data de abertura</label>
            <input id="data_abertura" name="data_abertura" value="{{ old('data_abertura', isset($caso) && $caso->data_abertura ? $caso->data_abertura->format('Y-m-d') : '') }}" type="date" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required />
            @error('data_abertura')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-2">
            <label for="data_finalizado" class="text-sm font-medium" style="color: #d9d9d9;">Data finalizado</label>
            <input id="data_finalizado" name="data_finalizado" value="{{ old('data_finalizado', isset($caso) && $caso->data_finalizado ? $caso->data_finalizado->format('Y-m-d') : '') }}" type="date" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" />
            @error('data_finalizado')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="rounded-2xl border p-5" style="background-color: #1a1a1a; border-color: #444444;">
        <p class="text-sm font-semibold uppercase tracking-widest mb-4" style="color: #d4af37;">Procedimentos realizados</p>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-5">
            @php
                $procedimentos = [
                    'entrevista'     => 'Entrevista',
                    'copia_hd'       => 'Cópia HD',
                    'copia_celular'  => 'Cópia Celular',
                    'monitoramento'  => 'Monitoramento',
                    'pesquisa_campo' => 'Pesquisa de Campo',
                ];
            @endphp
            @foreach($procedimentos as $field => $label)
                @php $checked = old($field, isset($caso) ? $caso->$field : false); @endphp
                <label class="flex items-center gap-2 cursor-pointer select-none">
                    <input type="checkbox" name="{{ $field }}" value="1"
                        {{ $checked ? 'checked' : '' }}
                        class="w-4 h-4 rounded cursor-pointer"
                        style="accent-color: #d4af37;">
                    <span class="text-sm" style="color: #d9d9d9;">{{ $label }}</span>
                </label>
            @endforeach
        </div>
    </div>
</div>
