<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get("/auth/login", [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'authenticate']);

Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::get('/auth/register/worker', [RegisterController::class, 'worker'])->name('register_worker');
Route::post('/auth/register/worker', [RegisterController::class, 'storeWorker']);

Route::get('/auth/register/user', [RegisterController::class, 'user'])->name('register_user');
Route::post('/auth/logout', [LogoutController::class, 'index'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

Route::get('/dashboard/categories/', [CategoryController::class, 'index'])->name('categories_admin');
Route::get('/dashboard/categories/add/', [CategoryController::class, 'add'])->name('add_category_admin');
Route::post('/dashboard/categories/add/', [CategoryController::class, 'store']);


Route::get("/worker/dashboard/", [WorkerDashboardController::class, 'index'])->name('worker_dashboard');
Route::get('/worker/skill-selection', [SkillSelectionController::class, 'index'])->name('choose_skill');
Route::post('/worker/skill-selection/{skill}/choose', [SkillSelectionController::class, 'storeSKill'])->name('select_skill');
Route::post('/worker/skill-selection/{skill}/destroy', [SkillSelectionController::class, 'destroySkill'])->name('unselect_skill');
Route::get('/worker/settings', [WorkerDashboardController::class, 'settings'])->name('worker_settings');
Route::post('/worker/settings/add-address', [WorkerDashboardController::class, 'storeAddress'])->name('worker_add_address');
Route::post('/worker/settings/add-phone-number', [WorkerDashboardController::class, 'storePhoneNumber'])->name('worker_add_phone_number');
