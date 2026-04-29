@extends('layouts.app')

@section('title', 'Об\'єкти — ' . config('app.name'))
@section('meta_description', 'Перевірені квартири, готельні номери та комерційні приміщення на оренду від 3 місяців.')

@section('content')

<section class="border-b border-[#19140014]">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 pt-16 pb-10">
        <p class="text-sm font-medium text-[#b97400] uppercase tracking-wider">Об'єкти</p>
        <h1 class="mt-3 text-4xl md:text-5xl font-semibold tracking-tight">Каталог</h1>
        <p class="mt-4 text-[#5a5a55] max-w-2xl">Усі об'єкти, що зараз доступні до оренди. Фільтри з'являться, коли каталог наповниться.</p>
    </div>
</section>

<section class="py-12 lg:py-16">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        @if($properties->isEmpty())
            <div class="rounded-2xl border border-dashed border-[#19140035] bg-white p-12 text-center">
                <div class="w-14 h-14 mx-auto rounded-2xl bg-amber-100 text-amber-700 grid place-items-center mb-5">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9-4 9 4M5 9.5V21h14V9.5M9 21V12h6v9"/></svg>
                </div>
                <h2 class="text-xl font-semibold">Ще немає опублікованих об'єктів</h2>
                <p class="mt-2 text-[#5a5a55] max-w-md mx-auto">Менеджер додає та оглядає перші об'єкти — каталог наповниться найближчим часом. Залиште заявку, і ми надішлемо варіанти, щойно вони з'являться.</p>
                <a href="{{ url('contact') }}" class="mt-6 inline-flex items-center justify-center rounded-lg bg-[#1b1b18] hover:bg-black text-white font-medium px-5 py-2.5 text-sm transition">
                    Залишити заявку
                </a>
            </div>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($properties as $property)
                    <article class="rounded-2xl border border-[#19140014] bg-white overflow-hidden hover:shadow-lg transition">
                        @if($property->photos && count($property->photos))
                            <div class="aspect-[4/3] bg-[#f5f5f3] overflow-hidden">
                                <img src="{{ asset('storage/' . $property->photos[0]) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="aspect-[4/3] bg-gradient-to-br from-amber-50 to-amber-100 grid place-items-center">
                                <svg class="w-12 h-12 text-amber-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9-4 9 4M5 9.5V21h14V9.5"/></svg>
                            </div>
                        @endif
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-[#5a5a55]">
                                <span class="rounded-full bg-amber-100 text-amber-800 px-2 py-0.5 font-medium">{{ $property->type?->getLabel() }}</span>
                                <span>{{ $property->city }}@if($property->district), {{ $property->district }}@endif</span>
                            </div>
                            <h3 class="mt-3 text-lg font-semibold leading-snug line-clamp-2">{{ $property->title }}</h3>
                            <div class="mt-4 flex items-baseline justify-between">
                                <div class="text-xl font-semibold">{{ number_format($property->monthly_rent_uah, 0, ',', ' ') }} грн<span class="text-sm font-normal text-[#5a5a55]">/міс</span></div>
                                <div class="text-xs text-[#5a5a55]">
                                    @if($property->rooms){{ $property->rooms }} кімн.@endif
                                    @if($property->area_sqm) · {{ $property->area_sqm }} м²@endif
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $properties->links() }}
            </div>
        @endif
    </div>
</section>

@endsection
