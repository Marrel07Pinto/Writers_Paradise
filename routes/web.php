<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EbooksController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\WprofileController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\EmailController;



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

Route::put('/submit-updatepost-form/{id}', [ProfileController::class, 'save_update_form']);
Route::get('/delete-post/{id}', [ChatController::class, 'destroy']);
Route::put('/submit-form/{id}', [WriterController::class, 'submitForm'])->name('writer.submit-form');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/Home', function () {
    return view('Home');
});
Route::get('/Form', function () {
    return view('Form');
});
Route::get('/Wprofile', function () {
    return view('Wprofile');
});
Route::get('/Wprofile', [WprofileController::class, 'index']);
Route::get('/mpost', [WprofileController::class, 'show_user_posts'])->name('update-post');
Route::get('/update-post/{id}', [ProfileController::class, 'update_post']);
Route::get('/Form/showForm', [WriterController::class, 'showForm'])->name('writer.showform');
Route::get('/Ebooks', [EbooksController::class, 'index']);
Route::get('/Chat', [ChatController::class, 'index']);
Route::get('/Comments', [CommentsController::class, 'index']);
Route::post('/Chat', [ChatController::class, 'store'])->name('Chat.store');
Route::get('/comments/{id}', [ChatController::class, 'comments'])->name('Chat.comments');
Route::get('/showuserposts', [ProfileController::class, 'show_user_posts']);
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [WriterController::class, 'index'])->name('profile.index');  
});
Route::post('save-comment/{slug}/{id}', [CommentsController::class, 'save_comment'])->name('save.comment');
Route::put('update-comment/{id}', [CommentsController::class, 'update_comment'])->name('update.comment');
Route::get('/user-posts/{id}',[ChatController::class, 'user_posts']);





Route::get('/Form/edit', [writerController::class, 'edit'])->name('Form.edit');
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
