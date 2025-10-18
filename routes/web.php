<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventHighlightController;
use App\Http\Controllers\Admin\NotableEventController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/notices', [HomeController::class, 'notices'])->name('notices');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

Auth::routes();

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('event-highlights', EventHighlightController::class);
    Route::resource('notable-events', NotableEventController::class);
    Route::resource('stories', StoryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('notices', NoticeController::class);
    Route::resource('galleries', GalleryController::class);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});
