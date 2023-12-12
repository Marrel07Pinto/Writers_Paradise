<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EbooksController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\WriterController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Home', function () {
    return view('Home');
});
Route::get('/Form', function () {
    return view('Form');
});
Route::get('/Profile', function () {
    return view('Profile');
});

Route::get('/Ebooks', [EbooksController::class, 'index']);

Route::get('/Chat', [ChatController::class, 'index']);
Route::post('/Chat', [ChatController::class, 'store'])->name('Chat.store');
Route::get('/comments/{id}', [ChatController::class, 'comments'])->name('Chat.comments');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [WriterController::class, 'index'])->name('profile.index');
});









Route::get('/Cart', function () {
    return view('Cart');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
