<?php
session_start();
var_dump($_SESSION);
use App\Http\Controllers\{UserController, UserReaderController, UserEditorController, UserAdminController, UserSuperAdminController, ArticleController, CustomAuthController};
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


Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('articles/store', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/login', [CustomAuthController::class, 'index'])->name('user.login');
Route::get('/disconnect', [CustomAuthController::class, 'disconnect'])->name('user.disconnect');
Route::post('/custom-login', [CustomAuthController::class, 'loginAttempt'])->name('login.custom');
Route::get('/', [UserController::class, 'index'])->name('user.index');

