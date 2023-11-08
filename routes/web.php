<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Middleware\Authenticate;
use App\Models\Users;
use Database\Seeders\UsersTableseeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/feed', function () {
    return view('feed');
})->middleware('auth');

Route::get('/createPost', function () {
    return view('createPost');
})->middleware('auth');


Route::post('/process-register.php', [UsersController::class, 'register']);

Route::post('/process-login.php', [LoginController::class, 'authenticate']);

Route::get('logout', [LoginController::class,'logout']);

Route::post('/process-posts.php', [PostsController::class, 'create']);

require __DIR__ . '/auth.php';