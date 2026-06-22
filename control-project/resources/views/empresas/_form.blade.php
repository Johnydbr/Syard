<div class="grid gap-6">
    <div class="grid gap-2">
        <label for="razao_social" class="text-sm font-medium text-slate-700">Razão social</label>
        <input id="razao_social" name="razao_social" value="{{ old('razao_social', $empresaSolicitante->razao_social ?? '') }}" type="text" class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200" required />
        @error('razao_social')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-2">
        <label for="cnpj" class="text-sm font-medium text-slate-700">CNPJ</label>
        <input id="cnpj" name="cnpj" value="{{ old('cnpj', $empresaSolicitante->cnpj ?? '') }}" type="text" class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-200" required />
        @error('cnpj')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
