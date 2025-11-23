<?php

use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LifeCycleTestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ItemController;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth:users', 'verified'])->name('dashboard');

Route::middleware('auth:users')->name('user.')->group(function(){
    Route::get('/', [ItemController::class, 'index'])->name('items.index');
});

Route::middleware('auth:users')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/component-test1', [ComponentTestController::class, 'showComponent1']);
Route::get('/component-test2', [ComponentTestController::class, 'showComponent2']);

Route::get('/servicecontainertest', [LifeCycleTestController::class, 'showServiceContainerTest']);
Route::get('/serviceprovidertest', [LifeCycleTestController::class, 'showServiceProviderTest']);

require __DIR__.'/auth.php';

Route::middleware('web')
    ->prefix('owner')
    ->name('owner.')
    ->group(base_path('routes/owner.php'));

Route::middleware('web')
    ->prefix('admin')
    ->name('admin.')
    ->group(base_path('routes/admin.php'));
