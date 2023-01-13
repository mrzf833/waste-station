<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\ClientController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\EmployeeController;
use App\Http\Controllers\Web\EmployeeProfileController;
use App\Http\Controllers\Web\InformationEducationController;
use App\Http\Controllers\Web\ItemPointController;
use App\Http\Controllers\Web\PointController;
use App\Http\Controllers\Web\PointExchangerController;
use App\Http\Controllers\Web\TransactionController;
use App\Http\Controllers\Web\TransactionDetailController;
use App\Http\Controllers\Web\User\AuthController as UserAuthController;
use App\Http\Controllers\Web\User\LandingPageController;
use App\Http\Controllers\Web\User\ProfileController;
use App\Http\Controllers\Web\User\RiwayatPenukaranController;
use App\Http\Controllers\Web\User\RiwayatSetorController;
use App\Http\Controllers\Web\User\TransactionController as UserTransactionController;
use App\Http\Controllers\Web\WasteCategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'dashboard-page'], function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('processLogin');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth', 'status.active']], function(){

        Route::group(['middleware' => 'employee'],function(){
            Route::get('/employee/profile', [EmployeeProfileController::class, 'show'])->name('employee.profile.show');
            Route::put('/employee/profile', [EmployeeProfileController::class, 'processEdit'])->name('employee.profile.edit');
        });

        Route::group(['middleware' => 'adminOrEmployee'], function(){
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::group(['prefix' => '/waste-category', 'as' => 'waste_category.'], function(){
                Route::get('/', [WasteCategoryController::class, 'index'])->name('index');
                Route::get('/datatable', [WasteCategoryController::class, 'datatable'])->name('datatable');
                Route::post('/', [WasteCategoryController::class, 'store'])->name('store');
                Route::get('/create', [WasteCategoryController::class, 'create'])->name('create');
                Route::get('/{wasteCategory:id}/show', [WasteCategoryController::class, 'show'])->name('show');
                Route::put('/{wasteCategory:id}/edit', [WasteCategoryController::class, 'edit'])->name('edit');
                Route::delete('/{wasteCategory:id}/delete', [WasteCategoryController::class, 'destroy'])->name('destroy');
            });

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
            Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
            Route::get('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.change_password');
            Route::put('/admin/change-password', [AdminController::class, 'processChangePassword'])->name('admin.change_password');

            Route::group(['prefix' => '/employee', 'as' => 'employee.'], function(){
                Route::get('/', [EmployeeController::class, 'index'])->name('index');
                Route::get('/datatable', [EmployeeController::class, 'datatable'])->name('datatable');
                Route::post('/', [EmployeeController::class, 'store'])->name('store');
                Route::get('/create', [EmployeeController::class, 'create'])->name('create');
                Route::get('/{user:id}/show', [EmployeeController::class, 'show'])->name('show');
                Route::put('/{user:id}/edit', [EmployeeController::class, 'edit'])->name('edit');
                Route::delete('/{user:id}/delete', [EmployeeController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => '/point', 'as' => 'point.'], function(){
                Route::get('/', [PointController::class, 'index'])->name('index');
                Route::get('/datatable', [PointController::class, 'datatable'])->name('datatable');
                Route::get('/{user:id}/show', [PointController::class, 'show'])->name('show');
                Route::put('/{user:id}/edit', [PointController::class, 'edit'])->name('edit');
            });

            Route::group(['prefix' => '/item-point', 'as' => 'item_point.'], function(){
                Route::get('/', [ItemPointController::class, 'index'])->name('index');
                Route::get('/datatable', [ItemPointController::class, 'datatable'])->name('datatable');
                Route::post('/', [ItemPointController::class, 'store'])->name('store');
                Route::get('/create', [ItemPointController::class, 'create'])->name('create');
                Route::get('/{itemPoint:id}/show', [ItemPointController::class, 'show'])->name('show');
                Route::put('/{itemPoint:id}/edit', [ItemPointController::class, 'edit'])->name('edit');
                Route::delete('/{itemPoint:id}/delete', [ItemPointController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => '/point-exchanger', 'as' => 'point_exchanger.'], function(){
                Route::get('/', [PointExchangerController::class, 'index'])->name('index');
                Route::get('/datatable', [PointExchangerController::class, 'datatable'])->name('datatable');
                Route::get('/process', [PointExchangerController::class, 'process'])->name('process');
                Route::get('/datatable/process', [PointExchangerController::class, 'datatableProcess'])->name('datatable.process');
                Route::get('/sent', [PointExchangerController::class, 'sent'])->name('sent');
                Route::get('/datatable/sent', [PointExchangerController::class, 'datatableSent'])->name('datatable.sent');
                Route::get('/accepted', [PointExchangerController::class, 'accepted'])->name('accepted');
                Route::get('/datatable/accepted', [PointExchangerController::class, 'datatableAccepted'])->name('datatable.accepted');
                Route::get('/rejected', [PointExchangerController::class, 'rejected'])->name('rejected');
                Route::get('/datatable/rejected', [PointExchangerController::class, 'datatableRejected'])->name('datatable.rejected');
                Route::put('/{pointExchange}/sent', [PointExchangerController::class, 'processSent'])->name('process.sent');
                Route::put('/{pointExchange}/rejected', [PointExchangerController::class, 'processRejected'])->name('process.rejected');
            });
        });
    }); 
});

Route::group([], function(){
    Route::post('/login', [UserAuthController::class, 'processLogin'])->name('landing.login');
    Route::post('/register', [UserAuthController::class, 'processRegister'])->name('landing.register');
    Route::post('/logout', [UserAuthController::class, 'processLogout'])->name('landing.logout');


    Route::get('/', [LandingPageController::class, 'home'])->name('landing.home');
    Route::get('/program', [LandingPageController::class, 'program'])->name('landing.program');
    Route::get('/information-education', [LandingPageController::class, 'informationEducation'])->name('landing.information_education');
    Route::get('/information-education/{informationEducation}', [LandingPageController::class, 'informationEducationDetail'])->name('landing.information_education.detail');
    Route::get('/kategori', [LandingPageController::class, 'kategori'])->name('landing.kategori');
    Route::get('/tentang', [LandingPageController::class, 'tentang'])->name('landing.tentang');

    Route::group(['prefix' => 'dashboard', 'as' => 'user.', 'middleware' => ['auth', 'client', 'status.active']], function(){
        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function(){
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::get('/show', [ProfileController::class, 'show'])->name('show');
            Route::put('/edit', [ProfileController::class, 'edit'])->name('edit');
        });

        Route::group(['prefix' => 'riwayat-setor', 'as' => 'riwayat_setor.'], function(){
            Route::get('/', [RiwayatSetorController::class, 'index'])->name('index');
            Route::get('/datatable', [RiwayatSetorController::class, 'datatable'])->name('datatable');
            Route::get('/{transaction}/detail', [RiwayatSetorController::class, 'detail'])->name('detail');
            Route::get('/datatable/{transaction}/detail', [RiwayatSetorController::class, 'datatableDetail'])->name('datatable.detail');
        });

        Route::group(['prefix' => 'riwayat-penukaran', 'as' => 'riwayat_penukaran.'], function(){
            Route::get('/', [RiwayatPenukaranController::class, 'index'])->name('index');
            Route::get('/{pointExchange}/detail', [RiwayatPenukaranController::class, 'detail'])->name('detail');
            Route::put('/{pointExchange}/accepted', [RiwayatPenukaranController::class, 'accepted'])->name('accepted');
        });

        Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function(){
            Route::get('/', [UserTransactionController::class, 'index'])->name('index');
            Route::get('/{itemPoint}/detail', [UserTransactionController::class, 'detail'])->name('detail');
            Route::get('/{itemPoint}/checkout', [UserTransactionController::class, 'checkout'])->name('checkout');
            Route::post('/{itemPoint}/checkout', [UserTransactionController::class, 'processCheckout'])->name('checkout');
        });
    });
});
