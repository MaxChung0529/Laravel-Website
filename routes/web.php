<?php

use App\Http\Controllers\UsersController;
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

Route::get('/feed', function () {
    return view('feed');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/process-register.php', [UsersController::class, 'register']);


Route::get('/createPost', function () {
    return view('createPost');
});

require __DIR__ . '/auth.php';