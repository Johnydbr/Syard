<div class="grid gap-6">
    <div class="grid gap-2">
        <label for="nome" class="text-sm font-medium text-slate-700">Nome</label>
        <input id="nome" name="nome" value="{{ old('nome', $solicitante->nome ?? '') }}" type="text" class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200" required />
        @error('nome')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-2">
        <label for="empresa_solicitante_id" class="text-sm font-medium text-slate-700">Empresa solicitante</label>
        <select id="empresa_solicitante_id" name="empresa_solicitante_id" class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200" required>
            <option value="">Selecione a empresa</option>
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}" {{ old('empresa_solicitante_id', $solicitante->empresa_solicitante_id ?? '') == $empresa->id ? 'selected' : '' }}>{{ $empresa->razao_social }}</option>
            @endforeach
        </select>
        @error('empresa_solicitante_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
