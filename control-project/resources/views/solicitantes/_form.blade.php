<div class="grid gap-6">
    <div class="grid gap-2">
        <label for="nome" class="text-sm font-medium" style="color: #d9d9d9;">Nome</label>
        <input id="nome" name="nome" value="{{ old('nome', $solicitante->nome ?? '') }}" type="text" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required />
        @error('nome')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <div class="grid gap-2">
            <label for="email" class="text-sm font-medium" style="color: #d9d9d9;">E-mail</label>
            <input id="email" name="email" value="{{ old('email', $solicitante->email ?? '') }}" type="email" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" placeholder="exemplo@email.com" />
            @error('email')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-2">
            <label for="contato" class="text-sm font-medium" style="color: #d9d9d9;">Contato</label>
            <input id="contato" name="contato" value="{{ old('contato', $solicitante->contato ?? '') }}" type="text" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" placeholder="(00) 00000-0000" />
            @error('contato')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid gap-2">
        <label for="empresa_solicitante_id" class="text-sm font-medium" style="color: #d9d9d9;">Empresa solicitante</label>
        <select id="empresa_solicitante_id" name="empresa_solicitante_id" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required>
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
