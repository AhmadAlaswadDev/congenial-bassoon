<?php

use App\Http\Controllers\Admin\ClubController;
use App\Http\Controllers\Admin\CommonCrudController;
use App\Http\Controllers\Admin\CommonQuestionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OfferCompanyController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\Admin\LoginController;
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






Route::redirect('/', 'admin/dashboard');
// Admin Auth roues
Route::group(['as' => 'admin.'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    //common crud for services and clients.
    Route::resource('crud', CommonCrudController::class);
    Route::get('crud-table-data', [CommonCrudController::class, 'getTableData'])->name('crud.table_data');
    // faqs
    Route::resource('faqs', CommonQuestionController::class);
    Route::get('faqs-table-data', [CommonQuestionController::class, 'getTableData'])->name('faqs.table_data');
    // clubs
    Route::resource('clubs', ClubController::class);
    Route::get('clubs-table-data', [ClubController::class, 'getTableData'])->name('clubs.table_data');
    Route::get('clubs-change-status', [ClubController::class, 'changeStatus'])->name('clubs.change_status');
    Route::get('clubs-change-soon', [ClubController::class, 'changeSoon'])->name('clubs.change_soon');
    // coupons
    Route::resource('coupons', CouponController::class);
    Route::get('coupons-table-data', [CouponController::class, 'getTableData'])->name('coupons.table_data');
    Route::get('coupons-change-soon', [CouponController::class, 'changeStatus'])->name('coupon.change_status');
    // offer companies
    Route::resource('offer-company', OfferCompanyController::class);
    Route::get('offer-companies-table-data', [OfferCompanyController::class, 'getTableData'])->name('offer-company.table_data');
    // offers
    Route::resource('offer', OfferController::class);
    Route::get('offer-table-data', [OfferController::class, 'getTableData'])->name('offer.table_data');
    Route::get('offe-change-status', [OfferController::class, 'changeStatus'])->name('offer.change_status');
    // offer users
    Route::get('offe-users/{offer}', [OfferController::class, 'showUsers'])->name('offer.users');
    Route::post('offer-users-store/{offer}', [OfferController::class, 'storeUser'])->name('offer.store_users');
    Route::delete('offer-users-store', [OfferController::class, 'removeUser'])->name('offer.destroy_user');
    Route::get('offer-users-table-data/{offer}', [OfferController::class, 'getUsersTableData'])->name('offer.users_table_data');

    // users routes
    Route::resource('users', UserController::class);
    Route::get('users-table-data', [UserController::class, 'getTableData'])->name('users.table_data');

    // subscribtion routes
    Route::resource('subscribtions', UserController::class);
    Route::post('subscribtions-confirm', [UserController::class, 'confirmSubscribtion'])->name('subscribtions.confirm');
    Route::get('subscribtions-table-data', [UserController::class, 'getTableData'])->name('subscribtions.table_data');

    // pages
    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
        Route::get('about', [PageController::class, 'showAboutPageIndex'])->name('about_us.index');
        Route::post('about/update', [PageController::class, 'updateAboutUsPage'])->name('about_us.update');
        Route::get('page/show/', [PageController::class, 'showPage'])->name('show');
        Route::post('page/update/', [PageController::class, 'updatePage'])->name('update');
    });

    // help-center
    Route::group(['prefix' => 'help-center', 'as' => 'help_center.'], function () {
        Route::resource('subjects', SubjectController::class);
        Route::resource('contacts', ContactController::class);
        Route::get('subjects-table-data', [SubjectController::class, 'getTableData'])->name('subjects.table_data');
        Route::get('contacts-table-data', [ContactController::class, 'getTableData'])->name('contacts.table_data');
    });


    // settings
    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('index', [SettingController::class, 'index'])->name('index');
        Route::post('update', [SettingController::class, 'update'])->name('update');
    });
    // admin profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('index', [ProfileController::class, 'index'])->name('index');
        Route::post('update', [ProfileController::class, 'update'])->name('update');
    });


    // downlod file from storage.
    Route::get('download-file', [DashboardController::class, 'downloadFile'])->name('file.download');
});
