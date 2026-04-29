<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('meta_description', 'Перевірені об\'єкти для оренди від 3 місяців: квартири, готельні номери, комерційні приміщення.')">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] antialiased">

@php $current = request()->path(); @endphp

<header class="sticky top-0 z-40 backdrop-blur-md bg-white/85 border-b border-[#19140014]">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 h-16 flex items-center justify-between">
        <a href="{{ url('/') }}" class="flex items-center gap-2 font-semibold text-lg tracking-tight">
            <span class="inline-block w-7 h-7 rounded-md bg-[#1b1b18] text-white grid place-items-center text-sm">Х</span>
            Хата · Diwave
        </a>
        <nav class="hidden md:flex items-center gap-7 text-sm">
            @foreach ([
                '/' => 'Головна',
                'listings' => 'Об\'єкти',
                'how-it-works' => 'Як це працює',
                'about' => 'Про нас',
                'contact' => 'Контакти',
            ] as $path => $label)
                @php $active = ($current === $path) || ($current === '/' && $path === '/'); @endphp
                <a href="{{ url($path) }}"
                   class="transition {{ $active ? 'text-black font-medium' : 'text-[#5a5a55] hover:text-black' }}">
                    {{ $label }}
                </a>
            @endforeach
        </nav>
        <a href="{{ url('/admin/login') }}"
           class="inline-flex items-center gap-1.5 rounded-lg bg-[#1b1b18] hover:bg-black text-white text-sm font-medium px-4 py-2 transition">
            Увійти
            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"/></svg>
        </a>
    </div>
    <details class="md:hidden border-t border-[#19140014]">
        <summary class="px-6 py-3 text-sm text-[#5a5a55] cursor-pointer select-none">Меню</summary>
        <div class="px-6 pb-4 flex flex-col gap-3 text-sm">
            <a href="{{ url('/') }}" class="text-[#1b1b18]">Головна</a>
            <a href="{{ url('listings') }}" class="text-[#1b1b18]">Об'єкти</a>
            <a href="{{ url('how-it-works') }}" class="text-[#1b1b18]">Як це працює</a>
            <a href="{{ url('about') }}" class="text-[#1b1b18]">Про нас</a>
            <a href="{{ url('contact') }}" class="text-[#1b1b18]">Контакти</a>
        </div>
    </details>
</header>

<main>
    @yield('content')
</main>

<footer class="border-t border-[#19140014] py-10 mt-20 text-sm text-[#706f6c]">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 flex flex-col md:flex-row justify-between gap-4">
        <p>© {{ date('Y') }} Diwave · хата.diwave.company</p>
        <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
            <a href="{{ url('listings') }}" class="hover:text-black transition">Об'єкти</a>
            <a href="{{ url('how-it-works') }}" class="hover:text-black transition">Як це працює</a>
            <a href="{{ url('about') }}" class="hover:text-black transition">Про нас</a>
            <a href="{{ url('contact') }}" class="hover:text-black transition">Контакти</a>
            <a href="{{ url('/admin/login') }}" class="hover:text-black transition">Адмін-панель</a>
        </div>
    </div>
</footer>

</body>
</html>
