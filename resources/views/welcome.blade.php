<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} — довгострокова оренда житла та комерції</title>
    <meta name="description" content="Перевірені об'єкти для оренди від 3 місяців: квартири, готельні номери, комерційні приміщення. Реальні фото, чесна оцінка менеджера, прозора ціна.">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] antialiased">

<header class="sticky top-0 z-40 backdrop-blur-md bg-white/80 border-b border-[#19140014]">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 h-16 flex items-center justify-between">
        <a href="/" class="flex items-center gap-2 font-semibold text-lg tracking-tight">
            <span class="inline-block w-7 h-7 rounded-md bg-[#1b1b18] text-white grid place-items-center text-sm">Х</span>
            Хата · Diwave
        </a>
        <nav class="hidden md:flex items-center gap-8 text-sm text-[#3a3a36]">
            <a href="#services" class="hover:text-black transition">Послуги</a>
            <a href="#why" class="hover:text-black transition">Чому ми</a>
            <a href="#how" class="hover:text-black transition">Як це працює</a>
            <a href="#contact" class="hover:text-black transition">Контакти</a>
        </nav>
        <a href="/admin/login"
           class="inline-flex items-center gap-1.5 rounded-lg bg-[#1b1b18] hover:bg-black text-white text-sm font-medium px-4 py-2 transition">
            Увійти
            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"/></svg>
        </a>
    </div>
</header>

<section class="relative overflow-hidden">
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-[#fff7e8] via-[#FDFDFC] to-[#FDFDFC]"></div>
    <div class="max-w-6xl mx-auto px-6 lg:px-8 pt-20 pb-24 lg:pt-28 lg:pb-32 text-center">
        <span class="inline-flex items-center gap-2 rounded-full bg-amber-100 text-amber-900 text-xs font-medium px-3 py-1 mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span>
            Оренда від 3 місяців
        </span>
        <h1 class="text-4xl md:text-6xl font-semibold tracking-tight leading-[1.05] max-w-4xl mx-auto">
            Житло та комерція без сюрпризів —<br class="hidden md:block">
            <span class="text-[#b97400]">так, як на фото</span>.
        </h1>
        <p class="mt-6 text-lg text-[#5a5a55] max-w-2xl mx-auto">
            Менеджер особисто оглядає кожен об'єкт, фотографує та виставляє три чесні оцінки: загальну, реальну та адекватність ціни. Ви бачите тільки вартісні варіанти.
        </p>
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="#services" class="inline-flex items-center justify-center rounded-lg bg-[#1b1b18] hover:bg-black text-white font-medium px-6 py-3 text-base transition w-full sm:w-auto">
                Дивитись послуги
            </a>
            <a href="/admin/login" class="inline-flex items-center justify-center rounded-lg border border-[#19140035] hover:border-black text-[#1b1b18] font-medium px-6 py-3 text-base transition w-full sm:w-auto">
                Адмін-панель
            </a>
        </div>
    </div>
</section>

<section id="services" class="border-t border-[#19140014] py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-sm font-medium text-[#b97400] uppercase tracking-wider">Послуги</p>
            <h2 class="mt-3 text-3xl md:text-4xl font-semibold tracking-tight">Що ми здаємо</h2>
            <p class="mt-4 text-[#5a5a55]">Усі об'єкти проходять огляд менеджером перед публікацією. Ви економите час на сумнівних варіантах.</p>
        </div>

        <div class="mt-12 grid md:grid-cols-3 gap-6">
            <div class="rounded-2xl border border-[#19140014] bg-white p-7 hover:shadow-lg transition">
                <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-700 grid place-items-center mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <h3 class="text-lg font-semibold">Квартири</h3>
                <p class="mt-2 text-sm text-[#5a5a55] leading-relaxed">Студії, 1-3 кімнатні квартири у житлових комплексах та центрі міста. Орендуються на термін від 3 місяців.</p>
            </div>

            <div class="rounded-2xl border border-[#19140014] bg-white p-7 hover:shadow-lg transition">
                <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-700 grid place-items-center mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M3 7v14M21 7v14M6 11h.01M6 15h.01M10 11h.01M10 15h.01M14 11h.01M14 15h.01M18 11h.01M18 15h.01M3 7l9-4 9 4"/></svg>
                </div>
                <h3 class="text-lg font-semibold">Готельні номери</h3>
                <p class="mt-2 text-sm text-[#5a5a55] leading-relaxed">Стандарт, делюкс, апартаменти — для довготривалого проживання у готелях-партнерах. Прибирання та сервіс включені.</p>
            </div>

            <div class="rounded-2xl border border-[#19140014] bg-white p-7 hover:shadow-lg transition">
                <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-700 grid place-items-center mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="text-lg font-semibold">Комерційні приміщення</h3>
                <p class="mt-2 text-sm text-[#5a5a55] leading-relaxed">Офіси, магазини, склади. Підбираємо локацію та умови оренди під ваш бізнес.</p>
            </div>
        </div>
    </div>
</section>

<section id="why" class="bg-[#1b1b18] text-white py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-sm font-medium text-amber-400 uppercase tracking-wider">Чому ми</p>
            <h2 class="mt-3 text-3xl md:text-4xl font-semibold tracking-tight">Що нас вирізняє</h2>
        </div>

        <div class="mt-14 grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div>
                <div class="text-4xl font-semibold text-amber-400">3×</div>
                <h3 class="mt-3 text-lg font-semibold">Три оцінки об'єкта</h3>
                <p class="mt-2 text-sm text-white/60 leading-relaxed">Загальна, реальна (відповідність опису) та адекватність ціни — від менеджера, який особисто оглянув житло.</p>
            </div>
            <div>
                <div class="text-4xl font-semibold text-amber-400">100%</div>
                <h3 class="mt-3 text-lg font-semibold">Реальні фото</h3>
                <p class="mt-2 text-sm text-white/60 leading-relaxed">Жодних фотошопів та склейок з рекламних буклетів. Те, що бачите — те і отримаєте.</p>
            </div>
            <div>
                <div class="text-4xl font-semibold text-amber-400">3 мес.</div>
                <h3 class="mt-3 text-lg font-semibold">Мінімальний термін</h3>
                <p class="mt-2 text-sm text-white/60 leading-relaxed">Орієнтуємось на стабільне проживання та довгострокові партнерства, а не подобову суєту.</p>
            </div>
            <div>
                <div class="text-4xl font-semibold text-amber-400">24/7</div>
                <h3 class="mt-3 text-lg font-semibold">AI-консультант</h3>
                <p class="mt-2 text-sm text-white/60 leading-relaxed">Голосовий помічник підбере об'єкт у живій розмові — українською, російською або англійською. <span class="text-white/40">(скоро)</span></p>
            </div>
        </div>
    </div>
</section>

<section id="how" class="py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-sm font-medium text-[#b97400] uppercase tracking-wider">Як це працює</p>
            <h2 class="mt-3 text-3xl md:text-4xl font-semibold tracking-tight">Від запиту до підписання договору</h2>
        </div>

        <ol class="mt-14 grid md:grid-cols-3 gap-6">
            <li class="rounded-2xl border border-[#19140014] bg-white p-7">
                <div class="text-sm font-semibold text-amber-700">Крок 1</div>
                <h3 class="mt-2 text-lg font-semibold">Розкажіть, що шукаєте</h3>
                <p class="mt-2 text-sm text-[#5a5a55] leading-relaxed">Місто, тип об'єкта, бюджет, термін. Можна голосом, можна у формі.</p>
            </li>
            <li class="rounded-2xl border border-[#19140014] bg-white p-7">
                <div class="text-sm font-semibold text-amber-700">Крок 2</div>
                <h3 class="mt-2 text-lg font-semibold">Підбір та перегляд</h3>
                <p class="mt-2 text-sm text-[#5a5a55] leading-relaxed">Надсилаємо тільки оглянуті менеджером варіанти з оцінками та реальними фото.</p>
            </li>
            <li class="rounded-2xl border border-[#19140014] bg-white p-7">
                <div class="text-sm font-semibold text-amber-700">Крок 3</div>
                <h3 class="mt-2 text-lg font-semibold">Заселення</h3>
                <p class="mt-2 text-sm text-[#5a5a55] leading-relaxed">Підписуємо договір, передаємо ключі. Подальші питання — через ваш персональний кабінет.</p>
            </li>
        </ol>
    </div>
</section>

<section id="contact" class="border-t border-[#19140014] py-20 lg:py-28">
    <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-semibold tracking-tight">Готові підібрати об'єкт?</h2>
        <p class="mt-4 text-[#5a5a55] max-w-xl mx-auto">Залиште заявку — менеджер передзвонить упродовж робочого дня.</p>
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="mailto:hello@diwave.company" class="inline-flex items-center justify-center rounded-lg bg-[#1b1b18] hover:bg-black text-white font-medium px-6 py-3 text-base transition">
                Написати на пошту
            </a>
            <a href="/admin/login" class="inline-flex items-center justify-center rounded-lg border border-[#19140035] hover:border-black text-[#1b1b18] font-medium px-6 py-3 text-base transition">
                Вхід для менеджерів
            </a>
        </div>
    </div>
</section>

<footer class="border-t border-[#19140014] py-10 text-sm text-[#706f6c]">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 flex flex-col md:flex-row justify-between gap-4">
        <p>© {{ date('Y') }} Diwave. Усі права захищено.</p>
        <div class="flex items-center gap-6">
            <a href="/admin/login" class="hover:text-black transition">Адмін-панель</a>
            <a href="mailto:hello@diwave.company" class="hover:text-black transition">hello@diwave.company</a>
        </div>
    </div>
</footer>

</body>
</html>
