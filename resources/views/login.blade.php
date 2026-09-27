<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGAP - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background: #f3f4f6;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-[#f3f4f6] px-4 py-10">
        <div class="w-full max-w-[520px] rounded-[26px] border border-slate-200 bg-white p-8 shadow-[0_18px_45px_rgba(15,23,42,0.08)] md:p-10">
            <div class="mb-8 text-center">
                <div class="mx-auto mb-4 inline-flex items-center justify-center rounded-full bg-blue-50 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.22em] text-blue-700">
                    SIGAP Platform
                </div>
                <h1 class="text-4xl font-black tracking-tight text-[#10233f] md:text-[3.2rem]">SIGAP Portal</h1>
                <p class="mt-3 text-lg text-slate-500">Masuk sesuai role yang Anda pilih</p>
            </div>

            @if($errors->any())
                <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-base font-medium text-red-600">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="demo-role" class="mb-2 block text-base font-semibold text-slate-700">Pilih Role</label>
                    <div class="relative">
                        <select id="demo-role" name="role" class="w-full appearance-none rounded-xl border border-slate-300 bg-white px-4 py-3.5 pr-10 text-lg text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100">
                            <option value="user">User / Citizen / Learner</option>
                            <option value="teacher">Teacher</option>
                            <option value="mentor">Mentor</option>
                            <option value="officer">Service Officer</option>
                            <option value="institution">Institution Admin</option>
                            <option value="admin">SIGAP System Admin</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-slate-500">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.24a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="email" class="mb-2 block text-base font-semibold text-slate-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', 'user@demo.com') }}" required autofocus class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3.5 text-lg text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100">
                </div>

                <div>
                    <label for="password" class="mb-2 block text-base font-semibold text-slate-700">Password</label>
                    <input id="password" type="password" name="password" value="password" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3.5 text-lg text-slate-800 shadow-sm outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100">
                </div>

                <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 px-5 py-4 text-2xl font-bold text-white shadow-lg shadow-blue-200 transition hover:brightness-105 focus:outline-none focus:ring-4 focus:ring-blue-200">
                    Masuk ke SIGAP
                </button>
            </form>

            <div class="mt-7 border-t border-slate-200 pt-5 text-sm text-slate-600">
                <p class="mb-3 text-base font-semibold text-slate-700">Akun demo:</p>
                <div class="space-y-2 leading-relaxed">
                    <p><span class="font-semibold text-slate-700">user@demo.com</span> / <span class="font-semibold text-slate-700">password</span> — User</p>
                    <p><span class="font-semibold text-slate-700">teacher@demo.com</span> / <span class="font-semibold text-slate-700">password</span> — Teacher</p>
                    <p><span class="font-semibold text-slate-700">mentor@demo.com</span> / <span class="font-semibold text-slate-700">password</span> — Mentor</p>
                    <p><span class="font-semibold text-slate-700">officer@demo.com</span> / <span class="font-semibold text-slate-700">password</span> — Officer</p>
                    <p><span class="font-semibold text-slate-700">institution@demo.com</span> / <span class="font-semibold text-slate-700">password</span> — Institution</p>
                    <p><span class="font-semibold text-slate-700">admin@demo.com</span> / <span class="font-semibold text-slate-700">password</span> — Admin</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const demoAccounts = {
            user: { email: 'user@demo.com', password: 'password' },
            teacher: { email: 'teacher@demo.com', password: 'password' },
            mentor: { email: 'mentor@demo.com', password: 'password' },
            officer: { email: 'officer@demo.com', password: 'password' },
            institution: { email: 'institution@demo.com', password: 'password' },
            admin: { email: 'admin@demo.com', password: 'password' },
        };

        const roleSelect = document.getElementById('demo-role');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        roleSelect.addEventListener('change', function () {
            const selected = demoAccounts[this.value];
            emailInput.value = selected.email;
            passwordInput.value = selected.password;
        });
    </script>
</body>
</html>
