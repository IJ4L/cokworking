<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TestimonialController::class, 'show'])->name('landing.page');
Route::get('/reservations', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/events', [AdminController::class, 'events'])->name('admin.events');
Route::get('/admin/testimonials', [AdminController::class, 'testimonial'])->name('admin.testimonials');

Route::resource('events', EventController::class);
Route::resource('testimonials', TestimonialController::class);