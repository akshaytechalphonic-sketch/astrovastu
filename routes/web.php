<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/simlink', function () {
    Artisan::call('storage:link');
    return '<h1>Linked Successfully !</h1>';
});


Route::get('/simlink', function () {
    Artisan::call('storage:link');
    return '<h1>Linked Successfully !</h1>';
});
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'showPage'])->name('about')->defaults('slug', 'about');
Route::get('/privacy-policy', [PageController::class, 'showPage'])->name('privacy-policy')->defaults('slug', 'privacy-policy');
Route::get('/terms-and-conditions', [PageController::class, 'showPage'])->name('terms-and-conditions')->defaults('slug', 'terms-and-conditions');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/service-detail.html', [ServiceController::class, 'show'])->name('services.show.compat'); // compatibility with static links
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog-detail.html', [BlogController::class, 'show'])->name('blog.show.compat'); // compatibility with static links
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/consult', [InquiryController::class, 'consult'])->name('consult');
// Route::get('/lp/vastu-consultant', [InquiryController::class, 'vastuConsultantLP'])->name('lp.vastu-consultant');
// Route::post('/consult', [InquiryController::class, 'storeConsult'])->name('consult.store');
Route::post('/consult', [InquiryController::class, 'storeConsult'])->name('consult.store');
Route::get('/contact', [InquiryController::class, 'contact'])->name('contact');
Route::post('/contact', [InquiryController::class, 'storeContact'])->name('contact.store');

Route::get('/lp/vastu-consultant', [App\Http\Controllers\PageController::class, 'newPage'])->name('pages.newpage');
Route::get('/lp/vastu-consultant-delhi-ncr', [App\Http\Controllers\PageController::class, 'vastuConsultantDelhiNcr'])->name('pages.vastu-delhi-ncr');
Route::get('/lp/astrodhiraj', [App\Http\Controllers\PageController::class, 'astrodhiraj'])->name('pages.astrodhiraj');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit')->middleware('guest');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

/*
|--------------------------------------------------------------------------
| Admin Panel Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Services CRUD
    Route::get('/services', [\App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [\App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [\App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [\App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [\App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [\App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('services.destroy');

    // Service Categories CRUD
    Route::get('/categories', [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [\App\Http\Controllers\Admin\ServiceCategoryController::class, 'destroy'])->name('categories.destroy');

    // Blog CRUD
    Route::get('/blogs', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create', [\App\Http\Controllers\Admin\BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [\App\Http\Controllers\Admin\BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{id}/edit', [\App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('blogs.destroy');

    // Gallery CRUD
    Route::get('/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [\App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [\App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Testimonials CRUD
    Route::get('/testimonials', [\App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('/testimonials/create', [\App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimonials', [\App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('/testimonials/{id}/edit', [\App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('/testimonials/{id}', [\App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{id}', [\App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // Banners CRUD
    Route::get('/banners', [\App\Http\Controllers\Admin\BannerController::class, 'index'])->name('banners.index');
    Route::get('/banners/create', [\App\Http\Controllers\Admin\BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners', [\App\Http\Controllers\Admin\BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{id}/edit', [\App\Http\Controllers\Admin\BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{id}', [\App\Http\Controllers\Admin\BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{id}', [\App\Http\Controllers\Admin\BannerController::class, 'destroy'])->name('banners.destroy');

    // Inquiries CRM
    Route::get('/inquiries', [\App\Http\Controllers\Admin\InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{id}', [\App\Http\Controllers\Admin\InquiryController::class, 'show'])->name('inquiries.show');
    Route::put('/inquiries/{id}/status', [\App\Http\Controllers\Admin\InquiryController::class, 'updateStatus'])->name('inquiries.status');
    Route::delete('/inquiries/{id}', [\App\Http\Controllers\Admin\InquiryController::class, 'destroy'])->name('inquiries.destroy');

    // Settings
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

    // Pages CRUD
    Route::get('/pages', [\App\Http\Controllers\Admin\PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/create', [\App\Http\Controllers\Admin\PageController::class, 'create'])->name('pages.create');
    Route::post('/pages', [\App\Http\Controllers\Admin\PageController::class, 'store'])->name('pages.store');
    Route::get('/pages/{id}/edit', [\App\Http\Controllers\Admin\PageController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/{id}', [\App\Http\Controllers\Admin\PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{id}', [\App\Http\Controllers\Admin\PageController::class, 'destroy'])->name('pages.destroy');
});

// Dynamic Pages Frontend Route
Route::get('/{slug}', [App\Http\Controllers\PageController::class, 'showPage'])->name('pages.show');
