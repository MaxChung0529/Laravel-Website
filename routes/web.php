<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ImageController;
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

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/index', [UsersController::class, 'index']);


Route::get('/login', function () {
    return view('login');
})->name('user.login');

Route::get('/register', function () {
    return view('register');
})->name('user.register');

Route::get('/createPost', function () {
    return view('createPost');
})->middleware('auth');

Route::get('logout', [LoginController::class, 'logout']);

Route::post('/process-register.php', [UsersController::class, 'register']);

Route::post('/process-login.php', [LoginController::class, 'authenticate']);

Route::post('/process-post.php', [PostsController::class, 'create']);

Route::post('/process-comment.php', [PostsController::class, 'addComment']);

Route::post('/editComment', [PostsController::class, 'editComment'])->name('comment.edit')->middleware('auth');

Route::get('/destroyComment/{id}', [PostsController::class, 'deleteComments'])->name('comment.destroy')->middleware('auth');

Route::get('/?post_id={id}', function () {
    return view('editPost');
})->name('post.edit')->middleware('auth');

Route::get('/deletePost/{id}', [PostsController::class, 'deletePosts'])->name('post.destroy')->middleware('auth');

Route::get('/feed', [PostsController::class, 'getPosts'])->middleware('auth');

Route::get('/notifications', [NotificationController::class, 'getNotifications'])->name('notification.get')->middleware('auth');

Route::post('update-profile.php', [UsersController::class, 'update']);

Route::post('add_comment.php', [PostsController::class, 'addComment']);

Route::post('fetch_comment.php', [PostsController::class, 'getComments']);

Route::get('/{id}', [UsersController::class, 'getDetail'])->name('user.view')->middleware('auth');


require __DIR__ . '/auth.php';