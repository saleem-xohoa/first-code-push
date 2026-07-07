<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReporterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/view', [CustomerController::class, 'view'])->name('customer.view');
Route::get('/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/users-data', [CustomerController::class, 'getdata']);

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products/store', [ProductController::class, 'store'])
    ->name('products.store');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

Route::put('/products/{product}', [ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])
    ->name('products.destroy');


Route::get('/products-data', [ProductController::class, 'productdata']);
Route::get('/student', [StudentController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/post', [PostController::class, 'index']);
Route::get('/role', [RoleController::class, 'index']);
Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);
Route::resource('company', CompanyController::class);
Route::resource('country', CountryController::class);
Route::resource('reporter', ReporterController::class);
Route::resource('article', ArticleController::class);
