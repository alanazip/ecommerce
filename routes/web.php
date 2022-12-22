<?php

use App\Http\Controllers\ProfileController;


use App\Http\Controllers\ContatoManagerController;
use App\Http\Controllers\ContatosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoManagerController;
use App\Http\Controllers\CategoriaManagerController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\CompraManagerController;
use App\Http\Controllers\FornecedorManagerController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CarrinhoManager;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

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

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

Route::get('/',[HomeController::class,'index'])->name('site.home');

Route::get('/produtos', [ProdutosController::class, 'index'])->name('site.produtos');

Route::get('/compras', [ComprasController::class, 'index'])->name('site.compras');

Route::get('/contatos', [ContatosController::class, 'index'])->name('site.contatos');

Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('site.fornecedores');

Route::get('/categorias', [CategoriasController::class, 'index'])->name('site.categorias');

Route::get('/admin', [RegisteredUserController::class, 'index'])->name('site.admin');

Route::get('/carrinho_compras', [CarrinhoManager::class, 'index'])->name('site.carrinho');


Route::post('/carrinho_compras', [CarrinhoManager::class, 'store'])->name('site.carrinho');

Route::post('/contatos', [ContatosController::class, 'store'])->name('site.contatos');

Route::post('/fornecedores', [FornecedoresController::class, 'store'])->name('site.fornecedores');

Route::post('/categorias', [CategoriasController::class, 'store'])->name('site.categorias');

Route::resource('/produtosmanager', ProdutoManagerController::class);

Route::resource('/comprasmanager', CompraManagerController::class);

Route::resource('/contatosmanager', ContatoManagerController::class);

Route::resource('/fornecedoresmanager', FornecedorManagerController::class);

Route::resource('/categoriasmanager', CategoriaManagerController::class);

Route::resource('/carrinho', CarrinhoManager::class);

Route::group(['middleware' => ['can:admin']], function () {
    Route::resource('/adminmanager', RegisteredUserController::class);
});

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
