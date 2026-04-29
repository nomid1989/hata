@extends('layouts.app')

@section('title', 'Контакти — ' . config('app.name'))

@section('content')

<section class="border-b border-[#19140014]">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 pt-16 pb-10">
        <p class="text-sm font-medium text-[#b97400] uppercase tracking-wider">Контакти</p>
        <h1 class="mt-3 text-4xl md:text-5xl font-semibold tracking-tight">Зв'язатися з нами</h1>
        <p class="mt-4 text-[#5a5a55] max-w-2xl">Залиште заявку або напишіть напряму — менеджер відповість упродовж робочого дня.</p>
    </div>
</section>

<section class="py-16 lg:py-20">
    <div class="max-w-5xl mx-auto px-6 lg:px-8 grid lg:grid-cols-2 gap-12">

        <div class="space-y-6">
            <div class="flex gap-4">
                <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-700 grid place-items-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="text-xs text-[#5a5a55] uppercase tracking-wider">Email</p>
                    <a href="mailto:hello@diwave.company" class="mt-1 text-lg font-semibold text-[#1b1b18] hover:underline">hello@diwave.company</a>
                </div>
            </div>

            <div class="flex gap-4">
                <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-700 grid place-items-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.95.68l1.5 4.5a1 1 0 01-.5 1.21l-2.26 1.13a11 11 0 005.52 5.52l1.13-2.26a1 1 0 011.21-.5l4.5 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2A16 16 0 013 5z"/></svg>
                </div>
                <div>
                    <p class="text-xs text-[#5a5a55] uppercase tracking-wider">Телефон</p>
                    <p class="mt-1 text-lg font-semibold text-[#1b1b18]">з'явиться невдовзі</p>
                </div>
            </div>

            <div class="flex gap-4">
                <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-700 grid place-items-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs text-[#5a5a55] uppercase tracking-wider">Локація</p>
                    <p class="mt-1 text-lg font-semibold text-[#1b1b18]">Львів, Україна</p>
                </div>
            </div>

            <div class="rounded-2xl bg-[#1b1b18] text-white p-6 mt-10">
                <p class="text-sm text-white/60 uppercase tracking-wider">Для менеджерів та власників</p>
                <p class="mt-3 text-white/90 leading-relaxed">Якщо ви менеджер або власник об'єкта, увійдіть до адмін-панелі.</p>
                <a href="{{ url('/admin/login') }}" class="mt-5 inline-flex items-center justify-center rounded-lg bg-amber-400 hover:bg-amber-300 text-[#1b1b18] font-semibold px-5 py-2.5 transition">
                    Увійти до панелі
                </a>
            </div>
        </div>

        <form method="POST" action="{{ url('contact') }}" class="rounded-2xl border border-[#19140014] bg-white p-8 space-y-5">
            @csrf
            @if(session('contact_sent'))
                <div class="rounded-lg bg-green-50 border border-green-200 text-green-900 px-4 py-3 text-sm">
                    Дякуємо! Менеджер зв'яжеться з вами найближчим часом.
                </div>
            @endif

            <div>
                <label class="block text-sm font-medium mb-1.5">Ваше ім'я</label>
                <input type="text" name="name" required class="w-full rounded-lg border border-[#19140035] bg-[#FDFDFC] px-4 py-2.5 text-sm focus:border-black focus:outline-none focus:ring-2 focus:ring-amber-200">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1.5">Email або телефон</label>
                <input type="text" name="contact" required class="w-full rounded-lg border border-[#19140035] bg-[#FDFDFC] px-4 py-2.5 text-sm focus:border-black focus:outline-none focus:ring-2 focus:ring-amber-200">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1.5">Що шукаєте</label>
                <textarea name="message" rows="4" required class="w-full rounded-lg border border-[#19140035] bg-[#FDFDFC] px-4 py-2.5 text-sm focus:border-black focus:outline-none focus:ring-2 focus:ring-amber-200" placeholder="Місто, тип об'єкта, бюджет, термін..."></textarea>
            </div>

            <button type="submit" class="w-full inline-flex items-center justify-center rounded-lg bg-[#1b1b18] hover:bg-black text-white font-medium px-5 py-3 transition">
                Надіслати заявку
            </button>
        </form>

    </div>
</section>

@endsection
