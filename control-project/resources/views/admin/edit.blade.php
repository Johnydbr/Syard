@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] font-semibold" style="color: #d4af37;">Editar usuário</p>
                <h2 class="text-2xl font-semibold text-white">Atualizar dados do usuário</h2>
            </div>
            <a href="{{ route('admin.index') }}" class="text-sm font-medium hover:opacity-80" style="color: #d4af37;">Voltar à lista</a>
        </div>

        <div class="rounded-3xl border p-6 shadow-sm" style="background-color: #2a2a2a; border-color: #444444;">
            <form action="{{ route('admin.update', $user) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid gap-6">
                    <div class="grid gap-2">
                        <label for="name" class="text-sm font-medium" style="color: #d9d9d9;">Nome</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                            class="w-full rounded-2xl border px-4 py-3 text-sm outline-none"
                            style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;"
                            required />
                        @error('name')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-2">
                        <label for="email" class="text-sm font-medium" style="color: #d9d9d9;">E-mail</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                            class="w-full rounded-2xl border px-4 py-3 text-sm outline-none"
                            style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;"
                            required />
                        @error('email')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="rounded-2xl border p-4 text-sm" style="border-color: #444444; color: #9a9a9a;">
                        Deixe os campos de senha em branco para manter a senha atual.
                    </div>

                    <div class="grid gap-2">
                        <label for="password" class="text-sm font-medium" style="color: #d9d9d9;">Nova senha</label>
                        <input id="password" name="password" type="password"
                            class="w-full rounded-2xl border px-4 py-3 text-sm outline-none"
                            style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" />
                        @error('password')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-2">
                        <label for="password_confirmation" class="text-sm font-medium" style="color: #d9d9d9;">Confirmar nova senha</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="w-full rounded-2xl border px-4 py-3 text-sm outline-none"
                            style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" />
                    </div>

                    <div class="grid gap-2">
                        <label for="role" class="text-sm font-medium" style="color: #d9d9d9;">Role</label>
                        <select id="role" name="role" class="w-full rounded-2xl border px-4 py-3 text-sm" style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;" required>
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Usuário</option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrador</option>
                        </select>
                        @error('role')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="inline-flex items-center justify-center rounded-2xl px-5 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90" style="background-color: #d4af37;">Salvar alterações</button>
                    <a href="{{ route('admin.index') }}" class="text-sm font-medium hover:opacity-80" style="color: #d4af37;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
