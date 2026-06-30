<div class="grid gap-6">
    <div class="grid gap-2">
        <label for="razao_social" class="text-sm font-medium" style="color: #d9d9d9;">Razão social</label>
        <input id="razao_social" name="razao_social" value="{{ old('razao_social', $empresaSolicitante->razao_social ?? '') }}" type="text" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required />
        @error('razao_social')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-2">
        <label for="cnpj" class="text-sm font-medium" style="color: #d9d9d9;">CNPJ</label>
        <input id="cnpj" name="cnpj" value="{{ old('cnpj', $empresaSolicitante->cnpj ?? '') }}" type="text" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required />
        @error('cnpj')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
