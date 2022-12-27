<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\ClientController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\InformationEducationController;
use App\Http\Controllers\Web\PointController;
use App\Http\Controllers\Web\TransactionController;
use App\Http\Controllers\Web\TransactionDetailController;
use App\Http\Controllers\Web\WasteController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('processLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'status.active']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => 'adminOrEmployee'], function(){
        Route::group(['prefix' => '/information-education', 'as' => 'information_education.'], function(){
            Route::get('/', [InformationEducationController::class, 'index'])->name('index');
            Route::get('/datatable', [InformationEducationController::class, 'datatable'])->name('datatable');
            Route::post('/', [InformationEducationController::class, 'store'])->name('store');
            Route::get('/create', [InformationEducationController::class, 'create'])->name('create');
            Route::get('/{informationEducation:id}/show', [InformationEducationController::class, 'show'])->name('show');
            Route::put('/{informationEducation:id}/edit', [InformationEducationController::class, 'edit'])->name('edit');
            Route::delete('/{informationEducation:id}/delete', [InformationEducationController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => '/client', 'as' => 'client.'], function(){
            Route::get('/', [ClientController::class, 'index'])->name('index');
            Route::get('/datatable', [ClientController::class, 'datatable'])->name('datatable');
            Route::get('/{user:id}/show', [ClientController::class, 'show'])->name('show');
            Route::put('/{user:id}/edit', [ClientController::class, 'edit'])->name('edit');
            Route::delete('/{user:id}/delete', [ClientController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => '/transaction', 'as' => 'transaction.'], function(){
            Route::get('/', [TransactionController::class, 'index'])->name('index');
            Route::post('/', [TransactionController::class, 'store'])->name('store');
            Route::get('/create', [TransactionController::class, 'create'])->name('create');
            Route::get('/datatable', [TransactionController::class, 'datatable'])->name('datatable');
            Route::get('/{transaction:id}/show', [TransactionController::class, 'show'])->name('show');
            Route::get('/{transaction:id}/edit', [TransactionController::class, 'editView'])->name('edit');
            Route::put('/{transaction:id}/edit', [TransactionController::class, 'edit'])->name('edit');
            Route::delete('/{transaction:id}/delete', [TransactionController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => '/transaction/{transaction:id}/transaction-detail', 'as' => 'transaction_detail.'], function(){
            Route::post('/', [TransactionDetailController::class, 'store'])->name('store');
            Route::get('/create', [TransactionDetailController::class, 'create'])->name('create');
            Route::get('/datatable', [TransactionDetailController::class, 'datatable'])->name('datatable');
            Route::get('/{transactionDetail}/show', [TransactionDetailController::class, 'show'])->name('show');
            Route::delete('/{transactionDetail}/delete', [TransactionDetailController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => '/waste', 'as' => 'waste.'], function(){
            Route::get('/', [WasteController::class, 'index'])->name('index');
            Route::post('/', [WasteController::class, 'store'])->name('store');
            Route::get('/create', [WasteController::class, 'create'])->name('create');
            Route::get('/datatable', [WasteController::class, 'datatable'])->name('datatable');
            Route::get('/{waste:id}/show', [WasteController::class, 'show'])->name('show');
            Route::put('/{waste:id}/edit', [WasteController::class, 'edit'])->name('edit');
            Route::delete('/{waste:id}/delete', [WasteController::class, 'destroy'])->name('destroy');
            Route::get('/{waste:id}/image/create', [WasteController::class, 'createImage'])->name('create.image');
            Route::post('/{waste:id}/image', [WasteController::class, 'storeImage'])->name('store.image');
            Route::delete('/{waste:id}/image/{image:id}/delete', [WasteController::class, 'deleteImage'])->name('destroy.image');
        });
    });

    Route::group(['middleware' => 'admin'], function(){
        Route::group(['prefix' => '/point', 'as' => 'point.'], function(){
            Route::get('/', [PointController::class, 'index'])->name('index');
            Route::get('/datatable', [PointController::class, 'datatable'])->name('datatable');
            Route::get('/{user:id}/show', [PointController::class, 'show'])->name('show');
            Route::put('/{user:id}/edit', [PointController::class, 'edit'])->name('edit');
        });
    });
});
