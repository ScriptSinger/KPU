<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\ConsumerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeConsumerController;
use GuzzleHttp\Middleware;

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

Auth::routes(['verify' => true]);

Route::get('/', [EmployeeController::class, 'index'])->name('personal')->middleware(['web', 'auth', 'activity']);
Route::resource('employees-area', EmployeeController::class)->middleware(['web', 'auth', 'activity']);
Route::resource('employees-consumer', EmployeeConsumerController::class)->middleware(['web', 'auth', 'activity']);


Route::group(['prefix' => 'admin', 'middleware' => ['role:super-user']], function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('consumers', ConsumerController::class);
    Route::get('consumer/export', [ConsumerController::class, 'export'])->name('consumers.export');
    Route::post('consumer/import', [ConsumerController::class, 'import'])->name('consumers.import');
});
