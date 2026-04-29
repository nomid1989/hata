@extends('layouts.app')

@section('title', 'Як це працює — ' . config('app.name'))

@section('content')

<section class="border-b border-[#19140014]">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 pt-16 pb-10">
        <p class="text-sm font-medium text-[#b97400] uppercase tracking-wider">Як це працює</p>
        <h1 class="mt-3 text-4xl md:text-5xl font-semibold tracking-tight">Від запиту до підписання договору</h1>
        <p class="mt-4 text-[#5a5a55] max-w-2xl">П'ять кроків, після яких ви заїжджаєте у перевірений об'єкт без сюрпризів.</p>
    </div>
</section>

<section class="py-16 lg:py-20">
    <div class="max-w-4xl mx-auto px-6 lg:px-8 space-y-10">
        @foreach([
            ['Запит', 'Розкажіть, що шукаєте', 'Місто, тип об\'єкта, бюджет, термін від 3 місяців. Можна голосом через AI-консультанта (скоро) або у формі на сторінці контактів.'],
            ['Огляд', 'Менеджер їде на об\'єкт', 'Особисто оглядає, фотографує, виставляє три оцінки: загальну, реальну (наскільки об\'єкт відповідає опису) та адекватність ціни.'],
            ['Підбір', 'Надсилаємо тільки оглянуті варіанти', 'У вашій підбірці — лише об\'єкти, які пройшли огляд. Жодних "приваблюючих" фото з інших ЖК.'],
            ['Перегляд', 'Зустрічаєтесь з менеджером на місці', 'Ми супроводжуємо перегляд, перевіряємо документи власника та обговорюємо умови договору.'],
            ['Заселення', 'Підписання та ключі', 'Прозорий договір, фіксована ціна, описаний у договорі стан майна. Подальші питання — через ваш персональний кабінет.'],
        ] as $i => $step)
            <div class="flex gap-6">
                <div class="flex-shrink-0">
                    <div class="w-11 h-11 rounded-xl bg-[#1b1b18] text-white grid place-items-center font-semibold">{{ $i + 1 }}</div>
                </div>
                <div class="flex-1 pb-10 border-b border-[#19140014] last:border-0 last:pb-0">
                    <p class="text-xs font-medium text-amber-700 uppercase tracking-wider">{{ $step[0] }}</p>
                    <h2 class="mt-2 text-xl md:text-2xl font-semibold">{{ $step[1] }}</h2>
                    <p class="mt-3 text-[#5a5a55] leading-relaxed">{{ $step[2] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="py-16 bg-[#1b1b18] text-white">
    <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-semibold">Готові почати?</h2>
        <a href="{{ url('contact') }}" class="mt-6 inline-flex items-center justify-center rounded-lg bg-amber-400 hover:bg-amber-300 text-[#1b1b18] font-semibold px-6 py-3 transition">
            Залишити заявку
        </a>
    </div>
</section>

@endsection
