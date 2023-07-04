<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\DynamicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'login_view'])->name('login')->middleware(RedirectIfAuthenticated::class);
    Route::post('login', [AuthController::class, 'login_process'])->middleware(RedirectIfAuthenticated::class);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware(Authenticate::class);

    Route::controller(SubjectController::class)->middleware(Authenticate::class)->group(function () {
        Route::get('subjects', 'index')->name('subjects');
        Route::get('subject/create', 'create')->name('subject.create');
        Route::post('subject/create', 'store');
        Route::get('subject/{subject}/edit', 'edit')->name('subject.edit');
        Route::post('subject/{subject}/edit', 'update');
        Route::get('subject/{subject}/destroy', 'destroy')->name('subject.destroy');
    });

    Route::controller(TopicController::class)->middleware(Authenticate::class)->group(function () {
        Route::get('topics', 'index')->name('topics');
        Route::get('topic/create', 'create')->name('topic.create');
        Route::post('topic/create', 'store');
        Route::get('topic/{topic}/edit', 'edit')->name('topic.edit');
        Route::post('topic/{topic}/edit', 'update');
        Route::get('topic/{topic}/destroy', 'destroy')->name('topic.destroy');
    });

    Route::controller(QuestionController::class)->middleware(Authenticate::class)->group(function () {
        Route::get('questions', 'index')->name('questions');
        Route::get('question/create', 'create')->name('question.create');
        Route::post('question/create', 'store');
        Route::get('question/{question}/edit', 'edit')->name('question.edit');
        Route::post('question/{question}/edit', 'update');
        Route::get('question/{question}/destroy', 'destroy')->name('question.destroy');
    });

    Route::controller(DynamicController::class)->middleware(Authenticate::class)->group(function () {
        Route::post("subject/topics", 'fetch_topics')->name('subject.topics');
    });

});

Route::get('/create', function () {
    $data = [
        'name' => 'The Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('12345'),
    ];

    User::create($data);
    return redirect()->route('admin.login');
});
