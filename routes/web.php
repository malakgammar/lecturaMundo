<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// ======================== ADMIN ========================
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Routes réservées aux administrateurs
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::get('/admin/editusers/{user}', [AdminUserController::class, 'edit'])->name('admin.editusers');
    Route::put('/admin/updateusers/{user}', [AdminUserController::class, 'update'])->name('admin.updateusers');
    Route::delete('/admin/deleteusers/{user}', [AdminUserController::class, 'destroy'])->name('admin.deleteusers');

    Route::get('/admin/livres', [LivreController::class, 'index'])->name('admin.indexlivres');
    Route::get('/admin/livres/{livre}', [LivreController::class, 'show'])->name('admin.showlivres');
    Route::get('admin/creatlivres', [LivreController::class, 'create'])->name('admin.creatlivres');
    Route::post('/admin/storelivres', [LivreController::class, 'store'])->name('admin.storelivres');
    Route::get('/admin/editlivres/{livre}', [LivreController::class, 'edit'])->name('admin.editlivres');
    Route::put('/admin/updatelivres/{livre}', [LivreController::class, 'update'])->name('admin.updatelivres');
    Route::delete('/admin/deletelivres/{livre}', [LivreController::class, 'destroy'])->name('admin.deletelivres');






    Route::get('/admin/categories', [CategorieController::class, 'index'])->name('admin.categories');
    Route::get('/admin/createcategories', [CategorieController::class, 'create'])->name('admin.createcategories');
    Route::post('/admin/storecategories', [CategorieController::class, 'store'])->name('admin.storecategories');
    Route::get('/admin/editcategorie/{category}', [CategorieController::class, 'edit'])->name('admin.editcategorie');
    Route::put('/admin/updatecategorie/{category}', [CategorieController::class, 'update'])->name('admin.updatecategorie');
    Route::delete('/admin/deletecategorie/{category}', [CategorieController::class, 'destroy'])->name('admin.deletecategorie');

    // Dashboard admin
    
    
    // Gérer les réservations
    Route::get('/admin/reservations', [ReservationController::class, 'manage'])->name('admin.reservations');
    Route::post('/reservations/{reservation}/approve', [ReservationController::class, 'approve'])->name('reservations.approve');
    Route::post('/reservations/{reservation}/reject', [ReservationController::class, 'reject'])->name('reservations.reject');
});



// ======================== UTILISATEUR ========================
Route::middleware(['auth'])->group(function () {
    Route::get('/livres', [LivreController::class, 'indexuser'])->name('user.livres');
    Route::get('/livres/{livre}', [LivreController::class, 'showlivres'])->name('user.showlivres');
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');

    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/create/{livre}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations/{livre}', [ReservationController::class, 'store'])->name('reservations.store');
    Route::post('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');

    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
});
