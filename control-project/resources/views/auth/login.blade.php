<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login — Syard Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #1a1a1a;" class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">
        <div class="mb-8 flex flex-col items-center gap-3">
            <img src="/images/backgrounds/logo-background.png" alt="Logo Syard" class="h-20 w-auto">
            <div class="text-center">
                <p class="text-xs uppercase tracking-[0.3em] font-semibold" style="color: #d4af37;">Syard</p>
                <h1 class="mt-1 text-2xl font-semibold text-white">Acesso ao Sistema</h1>
                <p class="mt-1 text-sm" style="color: #9a9a9a;">Entre com suas credenciais para continuar</p>
            </div>
        </div>

        <div class="rounded-3xl border p-8 shadow-lg" style="background-color: #2a2a2a; border-color: #444444;">

            @if($errors->any())
                <div class="mb-6 rounded-xl border p-4 text-sm" style="border-color: #d4af37; background-color: #2a1111; color: #fca5a5;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid gap-2">
                    <label for="email" class="text-sm font-medium" style="color: #d9d9d9;">E-mail</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        class="w-full rounded-2xl border px-4 py-3 text-sm outline-none"
                        style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;"
                        placeholder="seu@email.com"
                        required
                    />
                </div>

                <div class="grid gap-2">
                    <label for="password" class="text-sm font-medium" style="color: #d9d9d9;">Senha</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        class="w-full rounded-2xl border px-4 py-3 text-sm outline-none"
                        style="background-color: #1a1a1a; border-color: #444444; color: #d9d9d9;"
                        placeholder="••••••••"
                        required
                    />
                </div>

                <div class="flex items-center gap-2">
                    <input id="remember" name="remember" type="checkbox" class="rounded" style="accent-color: #d4af37;" />
                    <label for="remember" class="text-sm" style="color: #9a9a9a;">Lembrar-me</label>
                </div>

                <button
                    type="submit"
                    class="w-full rounded-2xl px-5 py-3 text-sm font-semibold text-white shadow-sm hover:opacity-90 transition-opacity"
                    style="background-color: #d4af37;"
                >
                    Entrar
                </button>
            </form>
        </div>

        <p class="mt-6 text-center text-xs" style="color: #555555;">
            &copy; {{ date('Y') }} Syard. Todos os direitos reservados.
        </p>
    </div>

</body>
</html>
