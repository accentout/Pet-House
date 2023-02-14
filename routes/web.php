<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|x
*/

Route::get('/', [UserController::class,'home'])->name('main');
Route::get('/home', [UserController::class,'home'])->name('home');
Route::get('/pets', [PublicationController::class,'pets'])->name('pets');
Route::get('/pets/{id}', [PublicationController::class,'pet'])->name('pet');
Route::middleware('guest')->group(function ()
{
    Route::get('/sign-up', [UserController::class,'signUp'])->name('signup');
    Route::post('/sign-up/sign-up-store', [UserController::class,'signUpStore'])->name('signup.store');
    Route::get('/sign-in', [UserController::class,'signIn'])->name('signin');
    Route::post('/sign-in/sign-in-store', [UserController::class,'signInStore'])->name('signin.store');
});
Route::middleware('auth')->group(function ()
{
    Route::get('/profile', [UserController::class,'profile'])->name('profile');
    Route::prefix('change')->group(function ()
    {
        Route::get('/{id}', [UserController::class,'change'])->name('password.change');
        Route::post('/{id}/change-store', [UserController::class, 'changeStore'])->name('password.change.store');
    });
    Route::get('/sign-out', [UserController::class,'signOut'])->name('signout');
    Route::get('/create', [PublicationController::class,'create'])->name('publication.create');
    Route::post('/create/create-store', [PublicationController::class,'createStore'])->name('publication.create.store')->middleware('throttle:publicationForm');;
    Route::prefix('edit')->group(function ()
    {
        Route::get('/{id}', [UserController::class,'edit'])->name('publication.edit');
        Route::post('/{id}/edit-store', [UserController::class, 'editStore'])->name('publication.edit.store');
    });
    Route::get('/delete/{id}', [UserController::class,'delete'])->name('publication.delete');
    Route::prefix('/publications')->group(function () {
        Route::get('/', [AdminController::class, 'publications'])->name('publications');
        Route::post('/fetch', [AdminController::class, 'publications_fetch'])->name('publications.fetch');
    });
    Route::prefix('requests')->group(function ()
    {
        Route::get('/', [AdminController::class, 'requests'])->name('requests');
        Route::get('/{id}/confirm', [AdminController::class, 'requestConfirm'])->name('request.confirm');
        Route::get('/{id}/reject', [AdminController::class, 'requestReject'])->name('request.reject');
        Route::post('/{id}/reject/message', [MessageController::class, 'requestRejectMessage'])->name('request.reject.message');
    });
    Route::prefix('users')->group(function ()
    {
        Route::get('/', [AdminController::class, 'users'])->name('users');
        Route::get('/{id}/ban', [AdminController::class, 'userBan'])->name('user.ban');
        Route::get('/{id}/unban', [AdminController::class, 'userUnban'])->name('user.unban');
        Route::post('/fetch', [AdminController::class, 'users_fetch'])->name('users.fetch');
    });
    Route::prefix('create-comment')->group(function ()
    {
        Route::get('/{id}', [CommentController::class, 'createComment'])->name('comment.create');
        Route::post('/{id}/create-comment-store', [CommentController::class, 'createCommentStore'])->name('comment.create.store');
        Route::get('/comment-delete/{id}', [CommentController::class, 'deleteComment'])->name('comment.delete');
    });
});
