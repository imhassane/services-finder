<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Collaborator\CollaboratorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Worker\SkillSelectionController;
use App\Http\Controllers\Worker\WorkerDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/notifications', [DashboardController::class, 'index'])->name('notifications');
Route::get('/account/me', [DashboardController::class, 'index'])->name('account');

Route::prefix('auth')->group(function() {

    Route::get("/login", [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::get('/reactivation', [LoginController::class, 'reactivationDemand'])->name('reactivation_demand');
    Route::post('/reactivation', [LoginController::class, 'reactivate']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::get('/register/worker', [RegisterController::class, 'worker'])->name('register_worker');
    Route::post('/register/worker', [RegisterController::class, 'storeWorker']);

    Route::get('/register/user', [RegisterController::class, 'user'])->name('register_user');
    Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

});

Route::prefix('dashboard')->group(function() {

    Route::prefix('categories')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('categories_admin');
        Route::get('/add/', [CategoryController::class, 'add'])->name('add_category_admin');
        Route::post('/add/', [CategoryController::class, 'store']);
        Route::delete('/{skill}/destroy/', [CategoryController::class, 'destroy'])->name('destroy_category_admin');
        Route::post('{skill}/activate/', [CategoryController::class, 'activate'])->name('activate_category_admin');

    });

    Route::prefix('workers')->group(function() {
        Route::get('/', [WorkerController::class, 'index'])->name('workers_admin');
        Route::delete('/{user}/block', [WorkerController::class, 'blockUser'])->name('block_user');
        Route::post('/{user}/activate', [WorkerController::class, 'activateUser'])->name('activate_user');
    });

    Route::prefix('collaborators')->group(function() {
        Route::get('/', [CollaboratorController::class, 'index'])->name('collaborators_admin');
        Route::get('/add', [CollaboratorController::class, 'add'])->name('collaborators_admin_add');
        Route::post('/add', [CollaboratorController::class, 'store']);
    });
});

Route::prefix('worker')->group(function() {
    Route::get("/dashboard/", [WorkerDashboardController::class, 'index'])->name('worker_dashboard');
    Route::get('/skill-selection', [SkillSelectionController::class, 'index'])->name('choose_skill');
    Route::post('/skill-selection/{skill}/choose', [SkillSelectionController::class, 'storeSKill'])->name('select_skill');
    Route::post('/skill-selection/{skill}/destroy', [SkillSelectionController::class, 'destroySkill'])->name('unselect_skill');
    Route::get('/settings', [WorkerDashboardController::class, 'settings'])->name('worker_settings');
    Route::post('/settings/add-address', [WorkerDashboardController::class, 'storeAddress'])->name('worker_add_address');
    Route::post('/settings/add-phone-number', [WorkerDashboardController::class, 'storePhoneNumber'])->name('worker_add_phone_number');
});
