<?php

use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\Owner\ImageController;
use App\Http\Controllers\Owner\ProductController;
use App\Http\Controllers\Owner\shopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LifeCycleTestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('shops')->middleware('auth:owners')->group(function(){
    Route::get('index', [shopController::class, 'index'])->name('shops.index');
    Route::get('edit/{shop}', [shopController::class, 'edit'])->name('shops.edit');
    Route::post('update/{shop}', [shopController::class, 'update'])->name('shops.update');
});

Route::resource('images', ImageController::class)
    ->middleware('auth:owners')->except(['show']);

Route::resource('products', ProductController::class)
    ->middleware('auth:owners');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:owners', 'verified'])->name('dashboard');

Route::middleware('auth:owners')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/component-test1', [ComponentTestController::class, 'showComponent1']);
Route::get('/component-test2', [ComponentTestController::class, 'showComponent2']);

Route::get('/servicecontainertest', [LifeCycleTestController::class, 'showServiceContainerTest']);
Route::get('/serviceprovidertest', [LifeCycleTestController::class, 'showServiceProviderTest']);

require __DIR__.'/ownerAuth.php';
