<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGAP - {{ $pageTitle ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; background: #f3f4f6; }
        .bg-navy { background-color: #0B132B; }
        .text-navy { color: #0B132B; }
        .btn-primary { background-color: #2563EB; color: white; transition: all 0.2s; }
        .btn-primary:hover { background-color: #1D4ED8; }
        .glass { background: rgba(255,255,255,0.7); backdrop-filter: blur(12px); }
    </style>
</head>
<body class="bg-slate-100 text-slate-800">
    <div class="flex min-h-screen pb-24 lg:pb-0">
        @include('components.user.sidebar')

        <div class="flex-1 lg:ml-0">
            @include('components.user.header', ['pageTitle' => $pageTitle ?? 'Overview'])

            <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>
    </div>

    @include('components.user.mobile-nav')
</body>
</html>
