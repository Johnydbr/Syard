<div class="grid gap-6">
    <div class="grid gap-2">
        <label for="nome" class="text-sm font-medium" style="color: #d9d9d9;">Nome</label>
        <input id="nome" name="nome" value="{{ old('nome', $pesquisado->nome ?? '') }}" type="text" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required />
        @error('nome')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-2">
        <label for="documento" class="text-sm font-medium" style="color: #d9d9d9;">Documento</label>
        <input id="documento" name="documento" value="{{ old('documento', $pesquisado->documento ?? '') }}" type="text" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required />
        @error('documento')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-2">
        <label for="tipo_de_pesquisado" class="text-sm font-medium" style="color: #d9d9d9;">Tipo de pesquisado</label>
        <input id="tipo_de_pesquisado" name="tipo_de_pesquisado" value="{{ old('tipo_de_pesquisado', $pesquisado->tipo_de_pesquisado ?? '') }}" type="text" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required />
        @error('tipo_de_pesquisado')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
