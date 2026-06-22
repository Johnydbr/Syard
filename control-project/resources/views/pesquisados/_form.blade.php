<div class="grid gap-6">
    <div class="grid gap-2">
        <label for="nome" class="text-sm font-medium text-slate-700">Nome</label>
        <input id="nome" name="nome" value="{{ old('nome', $pesquisado->nome ?? '') }}" type="text" class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200" required />
        @error('nome')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-2">
        <label for="documento" class="text-sm font-medium text-slate-700">Documento</label>
        <input id="documento" name="documento" value="{{ old('documento', $pesquisado->documento ?? '') }}" type="text" class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200" required />
        @error('documento')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-2">
        <label for="tipo_de_pesquisado" class="text-sm font-medium text-slate-700">Tipo de pesquisado</label>
        <input id="tipo_de_pesquisado" name="tipo_de_pesquisado" value="{{ old('tipo_de_pesquisado', $pesquisado->tipo_de_pesquisado ?? '') }}" type="text" class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200" required />
        @error('tipo_de_pesquisado')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
