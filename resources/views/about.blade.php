@extends('layouts.app')

@section('title', 'Про нас — ' . config('app.name'))

@section('content')

<section class="border-b border-[#19140014]">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 pt-16 pb-10">
        <p class="text-sm font-medium text-[#b97400] uppercase tracking-wider">Про нас</p>
        <h1 class="mt-3 text-4xl md:text-5xl font-semibold tracking-tight">Ми робимо оренду чесною</h1>
    </div>
</section>

<section class="py-16 lg:py-20">
    <div class="max-w-3xl mx-auto px-6 lg:px-8 prose prose-lg">
        <p class="text-lg text-[#3a3a36] leading-relaxed">
            <strong>Хата</strong> — це проєкт компанії <strong>Diwave</strong>, який вирішує найбільшу проблему ринку довгострокової оренди: невідповідність між тим, що показано у оголошенні, і тим, що клієнт бачить на місці.
        </p>

        <h2 class="mt-10 text-2xl font-semibold">Наш принцип</h2>
        <p class="mt-3 text-[#3a3a36] leading-relaxed">
            Жоден об'єкт не потрапляє у каталог без особистого огляду менеджером. Менеджер їде на місце, фотографує, спілкується з власником та виставляє три оцінки за шкалою 1–10:
        </p>

        <ul class="mt-6 space-y-3 text-[#3a3a36]">
            <li class="flex gap-3"><span class="font-semibold text-amber-700 shrink-0 w-32">Загальна</span> <span>Загальне враження від об'єкта.</span></li>
            <li class="flex gap-3"><span class="font-semibold text-amber-700 shrink-0 w-32">Реальна</span> <span>Наскільки опис та фото відповідають дійсності.</span></li>
            <li class="flex gap-3"><span class="font-semibold text-amber-700 shrink-0 w-32">Адекватна</span> <span>Чи відповідає ціна стану та локації об'єкта.</span></li>
        </ul>

        <h2 class="mt-10 text-2xl font-semibold">Що далі</h2>
        <p class="mt-3 text-[#3a3a36] leading-relaxed">
            Найближчим часом запускаємо AI-консультанта — голосового помічника, який спілкується з вами як жива людина: ставить уточнюючі питання, добирає варіанти у живій розмові, домовляється про перегляд. Українською, російською або англійською — як вам зручніше.
        </p>

        <h2 class="mt-10 text-2xl font-semibold">Хто за цим стоїть</h2>
        <p class="mt-3 text-[#3a3a36] leading-relaxed">
            Команда Diwave. Працюємо з технологіями, орендою та клієнтським досвідом понад 5 років. Базуємось у Львові, працюємо по всій Україні.
        </p>
    </div>
</section>

@endsection
