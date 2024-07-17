<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\PromoPopUpController;
use App\Http\Controllers\AboutUsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::post('/contact-submit', [ContactController::class, 'submitContactForm'])->name('contact.submit');
Route::get('/news-detail/{id}', [NewsController::class, 'detail'])->name('news.detail');
Route::get('/magazine-detail/{id}', [MagazineController::class, 'detail'])->name('magazine.detail');
// Route untuk menampilkan semua kontak dan detail kontak


Route::controller(AuthController::class)->group(function () {
    // Route::get('register', 'register')->name('register');
    // Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'getDataDashboard'])->name('dashboard');

    Route::controller(TenantController::class)->prefix('tenant')->group(function () {
        Route::get('', 'index')->name('tenant');
        Route::get('create', 'create')->name('tenant.create');
        Route::post('store', 'store')->name('tenant.store');
        Route::get('show/{id}', 'show')->name('tenant.show');
        Route::get('edit/{id}', 'edit')->name('tenant.edit');
        Route::put('edit/{id}', 'update')->name('tenant.update');
        Route::delete('destroy/{id}', 'destroy')->name('tenant.destroy');
    });

    Route::controller(MagazineController::class)->prefix('magazines')->group(function () {
        Route::get('', 'index')->name('magazine.index');
        Route::get('create', 'create')->name('magazine.create');
        Route::post('store', 'store')->name('magazine.store');
        Route::get('show/{id}', 'show')->name('magazine.show');
        Route::get('edit/{id}', 'edit')->name('magazine.edit');
        Route::put('edit/{id}', 'update')->name('magazine.update');
        Route::delete('destroy/{id}', 'destroy')->name('magazine.destroy');
    });

    Route::controller(NewsController::class)->prefix('news')->group(function () {
        Route::get('', 'index')->name('news.index');
        Route::get('create', 'create')->name('news.create');
        Route::post('store', 'store')->name('news.store');
        Route::get('show/{id}', 'show')->name('news.show');
        Route::get('edit/{id}', 'edit')->name('news.edit');
        Route::put('edit/{id}', 'update')->name('news.update');
        Route::delete('destroy/{id}', 'destroy')->name('news.destroy');
    });

    Route::controller(PromoPopUpController::class)->prefix('promopopup')->group(function () {
        Route::get('', 'index')->name('promopopup.index');
        Route::get('create', 'create')->name('promopopup.create');
        Route::post('store', 'store')->name('promopopup.store');
        Route::get('show/{id}', 'show')->name('promopopup.show');
        Route::get('edit/{id}', 'edit')->name('promopopup.edit');
        Route::put('edit/{id}', 'update')->name('promopopup.update');
        Route::delete('destroy/{id}', 'destroy')->name('promopopup.destroy');
    });

    Route::resource('aboutus', AboutUsController::class);

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::post('/profile-update', [App\Http\Controllers\AuthController::class, 'updateProfile'])->name('profile.update');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contact.show');
});

Route::get('/event', [EventController::class, 'index'])->name('event.index');

Route::get('/media', [MediaController::class, 'index'])->name('media.index');

// Route::get('/directory', [App\Http\Controllers\DirectoryController::class, 'index'])->name('directory');
Route::get('/directory', [App\Http\Controllers\DirectoryController::class, 'index']);
// Route::get('/directory', [App\Http\Controllers\DirectoryController::class, 'search'])->name('search');


Route::get('/facilities', function () {
    return view('facilities.facilities');
});

Route::get('/contact-us', function () {
    return view('contactus.contactus');
})->name('contactus');


Route::get('/about-us', [AboutUsController::class, 'homepage'])->name('homepage');
