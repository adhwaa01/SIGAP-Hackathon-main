@extends('teacher.layout')

@section('title', 'Login SIGAP')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-navy mb-2">SIGAP Portal</h1>
            <p class="text-gray-500">Masuk sesuai role yang Anda pilih</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded mb-4 text-sm border border-red-200">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Role</label>
                <select id="demo-role" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                    <option value="user">User / Citizen / Learner</option>
                    <option value="teacher">Teacher / Mentor</option>
                    <option value="mentor">Mentor</option>
                    <option value="officer">Service Officer</option>
                    <option value="institution">Institution Admin</option>
                    <option value="admin">SIGAP System Admin</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', 'user@demo.com') }}" required autofocus
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" value="password" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <button type="submit" class="w-full btn-primary py-2 rounded-lg font-medium">
                Masuk ke SIGAP
            </button>
        </form>

        <div class="mt-6 text-sm text-gray-500 space-y-2">
            <p class="font-semibold text-gray-700">Akun demo:</p>
            <div class="space-y-1">
                <p><b>user@demo.com</b> / <b>password</b> — User</p>
                <p><b>teacher@demo.com</b> / <b>password</b> — Teacher</p>
                <p><b>mentor@demo.com</b> / <b>password</b> — Mentor</p>
                <p><b>officer@demo.com</b> / <b>password</b> — Officer</p>
                <p><b>institution@demo.com</b> / <b>password</b> — Institution</p>
                <p><b>admin@demo.com</b> / <b>password</b> — Admin</p>
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

    document.getElementById('demo-role').addEventListener('change', function () {
        const selected = demoAccounts[this.value];
        document.getElementById('email').value = selected.email;
        document.getElementById('password').value = selected.password;
    });
</script>
@endsection
