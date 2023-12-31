<?php

use App\Services\DeleteItemService;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Route;
use App\Services\ChangeStatusService;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\Profile\DashboardController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes(['register' => false, 'verify' => false,]);


Route::group(['middleware' => ['auth']], function () {
    Route::name('admin.')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::resource('/roles', RoleController::class);
            Route::resource('/users', UserController::class);
            Route::resource('/permissions', PermissionController::class);
            route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        });
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::get('delete_item/{id}/{table}/{type}', [DeleteItemService::class, 'delete_item'])->name('delete_item');
    Route::get('change_status/{id}/{table}/{status}', [ChangeStatusService::class, 'change_status'])->name('change_status');


});


Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('get-file', [FileUploadService::class, 'get_file'])->name('get-file');
