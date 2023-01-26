<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('posts.index');
//Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/post', [PostController::class, 'store'])->name('posts.store');
//Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');
//Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
//Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
//Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// 'Nombre raíz de la ruta', NameController::class, [ 'names' => 'nombreRutoRaiz', 'parameters' => 'nombreParametroRuta' ]
Route::resource('posts', PostController::class, [
    'names' => 'posts',
    'parameters' => ['posts' => 'post']
]);

Route::get('/about', function (){
    return view('info.repo');
})->name('info.repo');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
