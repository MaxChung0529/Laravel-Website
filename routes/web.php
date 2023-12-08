<?php

use App\Http\Controllers\LoginController;
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
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/createPost', function () {
    return view('createPost');
})->middleware('auth');

Route::get('logout', [LoginController::class,'logout']);

Route::post('/process-register.php', [UsersController::class, 'register']);

Route::post('/process-login.php', [LoginController::class, 'authenticate']);

Route::post('/process-post.php', [PostsController::class, 'create']);

Route::post('/process-comment.php', [PostsController::class, 'addComment']);

Route::get('feed',[PostsController::class, 'getPosts'])->middleware('auth');

Route::post('update-profile.php',[UsersController::class, 'update']);

Route::get('/{id}', [UsersController::class, 'getDetail'])->name('user.view');


require __DIR__ . '/auth.php';