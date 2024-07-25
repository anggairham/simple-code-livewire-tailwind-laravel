<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>

    <!-- Scripts -->
    @vite('resources/css/app.css')

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-100 font-family-karla flex">
    <aside class="relative h-screen w-64 hidden sm:block shadow-xl bg-blue-400">
        <nav class="text-white text-base font-semibold pt-3 bg-blue-500">
            <a href="student" class="flex items-center {{(Route::is('student')?'active-nav-link':'')}} text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Student
            </a>
            <a href="teacher" class="flex items-center {{(Route::is('teacher')?'active-nav-link':'')}} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Teacher
            </a>
            <a href="class" class="flex items-center  {{(Route::is('class')?'active-nav-link':'')}} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Class
            </a>
            <livewire:auth.logout/>
        </nav>
    </aside>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div>
                @if (session()->has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('success') }}
                </div>
                @endif
            </div>
            <div>
                @if (session()->has('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                    <span class="font-medium">Danger alert!</span>{{ session('error') }}
                </div>
                @endif
            </div>
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
</body>

</html>