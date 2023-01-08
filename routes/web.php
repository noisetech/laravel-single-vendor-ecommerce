<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::prefix('dashboard')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        // users
        Route::get('users', [UserController::class, 'index'])->name('users.index');

        // permission
        Route::get('permission', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('permission.data', [PermissionController::class, 'data'])->name('permission.data');
        Route::post('permission.store', [PermissionController::class, 'store'])->name('permission.store');
        Route::post('permission.destroy', [PermissionController::class, 'destroy'])->name('permission.destroy');
        Route::get('permission.dataById', [PermissionController::class, 'dataById'])->name('permission.dataById');
        Route::post('permission.update', [PermissionController::class, 'update'])->name('permission.update');


        // role
        Route::get('role', [RoleController::class, 'index'])->name('role.index');
        Route::get('role.data', [RoleController::class, 'data'])->name('role.data');
        Route::post('role.simpan', [RoleController::class, 'store'])->name('role.store');
        Route::post('role.destroy', [RoleController::class, 'destroy'])->name('role.destroy');
        Route::post('role.update', [RoleController::class, 'update'])->name('role.update');
        Route::get('role.dataById', [RoleController::class, 'dataById'])->name('role.dataById');

        // kategori
        Route::get('kategori', [KategoriController::class, 'index'])->name('katgori.index');
        Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('kategori.data', [KategoriController::class, 'data'])->name('kategori.data');
        Route::post('kategori.destroy', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        Route::get('kategori.dataById', [KategoriController::class, 'dataById'])->name('kategori.dataByid');
        Route::post('kategori.update', [KategoriController::class, 'update'])->name('kategori.update');

        // produk
        Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
        Route::post('produk.store', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('list_kategori', [ProdukController::class, 'list_kategori'])->name('list_kategori');
        Route::get('produk.data', [ProdukController::class, 'data'])->name('produk.data');
        Route::post('produk.destroy', [ProdukController::class, 'destroy'])->name('produk.destroy');
        Route::get('produk.dataById', [ProdukController::class, 'dataById'])->name('produk.dataById');
        Route::get('kategoriByProduk', [ProdukController::class, 'kategoriByProduk'])
            ->name('kategoriByProduk');
        Route::post('produk.update', [ProdukController::class, 'update'])
            ->name('produk.update');


        // sliders
        Route::get('slider', [SliderController::class, 'index'])
            ->name('slider');
        Route::get('slider.data', [SliderController::class, 'data'])
            ->name('slider.data');
        Route::post('slider.store', [SliderController::class, 'store'])
            ->name('slider.store');
        Route::post('slider.destroy', [SliderController::class, 'destroy'])
            ->name('slider.destroy');
        Route::get('slider.dataById', [SliderController::class, 'dataById'])
            ->name('slider.dataById');
        Route::post('slider.update', [SliderController::class, 'update'])
            ->name('slider.update');


        // provinsi
        Route::get('provinsi', [ProvinceController::class, 'index'])
            ->name('provinsi.index');
        Route::get('provinsi.data', [ProvinceController::class, 'data'])
            ->name('provinsi.data');


        // kota
        Route::get('kota', [CityController::class, 'index'])
            ->name('kota.index');
        Route::get('kota.data', [CityController::class, 'data'])
            ->name('kota.data');
    });
