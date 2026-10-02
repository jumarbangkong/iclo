<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ContactController;

// Language Toggle Route
Route::get('locale/{lang}', [LocaleController::class, 'switch'])->name('locale.switch');

use App\Http\Controllers\PageController;

// ICLO Corporate Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Experts
Route::get('/experts/{slug}', [PageController::class, 'expert'])->name('experts.show');
// For backward compatibility / named route mapping (since we used explicit names before)
Route::get('/experts/unang-mulkhan', [PageController::class, 'expert'])->defaults('slug', 'unang-mulkhan')->name('experts.unang-mulkhan');
Route::get('/experts/abdul-darda', [PageController::class, 'expert'])->defaults('slug', 'abdul-darda')->name('experts.abdul-darda');
Route::get('/experts/tauvik-muhammad', [PageController::class, 'expert'])->defaults('slug', 'tauvik-muhammad')->name('experts.tauvik-muhammad');
Route::get('/experts/dimas-bayu-arya-putra', [PageController::class, 'expert'])->defaults('slug', 'dimas-bayu-arya-putra')->name('experts.dimas-bayu-arya-putra');
Route::get('/experts/syarif-hidayat', [PageController::class, 'expert'])->defaults('slug', 'syarif-hidayat')->name('experts.syarif-hidayat');
Route::get('/experts/ambi-pradiptha', [PageController::class, 'expert'])->defaults('slug', 'ambi-pradiptha')->name('experts.ambi-pradiptha');
Route::get('/experts/floren-wahyu-purwanto', [PageController::class, 'expert'])->defaults('slug', 'floren-wahyu-purwanto')->name('experts.floren-wahyu-purwanto');
Route::get('/experts/ikomatussunniah', [PageController::class, 'expert'])->defaults('slug', 'ikomatussunniah')->name('experts.ikomatussunniah');
Route::get('/experts/era-catur-prasetya', [PageController::class, 'expert'])->defaults('slug', 'era-catur-prasetya')->name('experts.era-catur-prasetya');
Route::get('/experts/nadira-aulia-rulyani', [PageController::class, 'expert'])->defaults('slug', 'nadira-aulia-rulyani')->name('experts.nadira-aulia-rulyani');
Route::get('/experts/agung-satrio-wicaksono', [PageController::class, 'expert'])->defaults('slug', 'agung-satrio-wicaksono')->name('experts.agung-satrio-wicaksono');
Route::get('/experts/bayu-arie-fianto', [PageController::class, 'expert'])->defaults('slug', 'bayu-arie-fianto')->name('experts.bayu-arie-fianto');
Route::get('/experts/nayla-adila-taqiyya', [PageController::class, 'expert'])->defaults('slug', 'nayla-adila-taqiyya')->name('experts.nayla-adila-taqiyya');
Route::get('/experts/muhammad-nur-ar-royyan', [PageController::class, 'expert'])->defaults('slug', 'muhammad-nur-ar-royyan')->name('experts.muhammad-nur-ar-royyan');

Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/sectors', [PageController::class, 'sectors'])->name('sectors');
Route::get('/resources', [PageController::class, 'resources'])->name('resources');
Route::get('/lsp', [PageController::class, 'lsp'])->name('lsp');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Contact Form Handler
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit')->middleware('throttle:5,1');

// Public Article / Blog Routes
use App\Http\Controllers\ArticleController;
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Admin Panel Routes
use App\Http\Controllers\Admin\AdminController;
Route::prefix('admin')->group(function () {
    // Auth
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Dashboard & Resource Management
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Profile Settings
    Route::get('/profile', [AdminController::class, 'profileEdit'])->name('admin.profile.edit');
    Route::put('/profile', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
    
    // Authors CRUD
    Route::get('/authors', [AdminController::class, 'authorsIndex'])->name('admin.authors.index');
    Route::get('/authors/create', [AdminController::class, 'authorsCreate'])->name('admin.authors.create');
    Route::post('/authors', [AdminController::class, 'authorsStore'])->name('admin.authors.store');
    Route::get('/authors/{id}/edit', [AdminController::class, 'authorsEdit'])->name('admin.authors.edit');
    Route::put('/authors/{id}', [AdminController::class, 'authorsUpdate'])->name('admin.authors.update');
    Route::delete('/authors/{id}', [AdminController::class, 'authorsDestroy'])->name('admin.authors.destroy');

    // Categories
    Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('admin.categories.index');
    Route::get('/categories/create', [AdminController::class, 'categoriesCreate'])->name('admin.categories.create');
    Route::post('/categories', [AdminController::class, 'categoriesStore'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [AdminController::class, 'categoriesEdit'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [AdminController::class, 'categoriesUpdate'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [AdminController::class, 'categoriesDestroy'])->name('admin.categories.destroy');

    // Resource Categories
    Route::get('/resource-categories', [AdminController::class, 'resourceCategoriesIndex'])->name('admin.resource-categories.index');
    Route::get('/resource-categories/create', [AdminController::class, 'resourceCategoriesCreate'])->name('admin.resource-categories.create');
    Route::post('/resource-categories', [AdminController::class, 'resourceCategoriesStore'])->name('admin.resource-categories.store');
    Route::get('/resource-categories/{id}/edit', [AdminController::class, 'resourceCategoriesEdit'])->name('admin.resource-categories.edit');
    Route::put('/resource-categories/{id}', [AdminController::class, 'resourceCategoriesUpdate'])->name('admin.resource-categories.update');
    Route::delete('/resource-categories/{id}', [AdminController::class, 'resourceCategoriesDestroy'])->name('admin.resource-categories.destroy');

    // Articles CRUD
    Route::get('/articles', [AdminController::class, 'articlesIndex'])->name('admin.articles.index');
    Route::get('/articles/create', [AdminController::class, 'articlesCreate'])->name('admin.articles.create');
    Route::post('/articles', [AdminController::class, 'articlesStore'])->name('admin.articles.store');
    Route::get('/articles/{id}/edit', [AdminController::class, 'articlesEdit'])->name('admin.articles.edit');
    Route::put('/articles/{id}', [AdminController::class, 'articlesUpdate'])->name('admin.articles.update');
    Route::delete('/articles/{id}', [AdminController::class, 'articlesDestroy'])->name('admin.articles.destroy');
    // Resources CRUD
    Route::get('/resources', [AdminController::class, 'resourcesIndex'])->name('admin.resources.index');
    Route::get('/resources/create', [AdminController::class, 'resourcesCreate'])->name('admin.resources.create');
    Route::post('/resources', [AdminController::class, 'resourcesStore'])->name('admin.resources.store');
    Route::get('/resources/{id}/edit', [AdminController::class, 'resourcesEdit'])->name('admin.resources.edit');
    Route::put('/resources/{id}', [AdminController::class, 'resourcesUpdate'])->name('admin.resources.update');
    Route::delete('/resources/{id}', [AdminController::class, 'resourcesDestroy'])->name('admin.resources.destroy');

    // Sectors CRUD (Contact Sectors)
    Route::get('/sectors', [AdminController::class, 'sectorsIndex'])->name('admin.sectors.index');
    Route::get('/sectors/create', [AdminController::class, 'sectorsCreate'])->name('admin.sectors.create');
    Route::post('/sectors', [AdminController::class, 'sectorsStore'])->name('admin.sectors.store');
    Route::get('/sectors/{id}/edit', [AdminController::class, 'sectorsEdit'])->name('admin.sectors.edit');
    Route::put('/sectors/{id}', [AdminController::class, 'sectorsUpdate'])->name('admin.sectors.update');
    Route::delete('/sectors/{id}', [AdminController::class, 'sectorsDestroy'])->name('admin.sectors.destroy');

    // Contacts (Submissions)
    Route::get('/contacts', [AdminController::class, 'contactsIndex'])->name('admin.contacts.index');
    Route::get('/contacts/export/pdf', [AdminController::class, 'contactsExportPdf'])->name('admin.contacts.export.pdf');
    Route::get('/contacts/export/excel', [AdminController::class, 'contactsExportExcel'])->name('admin.contacts.export.excel');
    Route::get('/contacts/{id}', [AdminController::class, 'contactsShow'])->name('admin.contacts.show');
    Route::delete('/contacts/{id}', [AdminController::class, 'contactsDestroy'])->name('admin.contacts.destroy');
});

