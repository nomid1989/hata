<?php

use App\Enums\PropertyStatus;
use App\Models\Lead;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/listings', function () {
    $properties = Property::query()
        ->where('status', PropertyStatus::Published)
        ->latest()
        ->paginate(12);

    return view('listings', compact('properties'));
})->name('listings');

Route::view('/how-it-works', 'how-it-works')->name('how-it-works');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::post('/contact', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:120',
        'contact' => 'required|string|max:160',
        'message' => 'required|string|max:2000',
    ]);

    Lead::create($data + ['source' => 'contact_form']);

    return back()->with('contact_sent', true);
});
