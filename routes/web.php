<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/admin/login', [AuthController::class, 'login_view'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/admin/login', [AuthController::class, 'login_process'])->middleware(RedirectIfAuthenticated::class);
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout')->middleware(Authenticate::class);

Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('admin.subjects')->middleware(Authenticate::class);
Route::get('/admin/subject/create', [SubjectController::class, 'create'])->name('admin.subject.create')->middleware(Authenticate::class);

Route::get('/create', function () {
    $data = [
        'name' => 'The Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('12345'),
    ];

    User::create($data);
    return redirect()->route('admin.login');
});
