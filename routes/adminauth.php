<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\AdminAuth\PasswordController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\ProductController;




Route::middleware('guest:admin')->group(function () {

    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
                ->name('admin.login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('admin.password.request');

    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('admin.password.email');

    Route::get('admin/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('admin.password.reset');

    Route::post('admin/reset-password', [NewPasswordController::class, 'store'])
                ->name('admin.password.store');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('admin/verify-email', EmailVerificationPromptController::class)
                ->name('admin.verification.notice');

    Route::get('admin/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('admin.verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('admin.verification.send');

    Route::get('admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('admin.password.confirm');

    Route::post('admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('admin/password', [PasswordController::class, 'update'])->name('admin.password.update');

    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('admin.logout');
});

// Route::get('/admin/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


Route::middleware('auth:admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/update/admin/profile', [AdminController::class, 'UpdateAdminProfile'])->name('update.admin.profile');
    Route::get('/admin/password', [AdminController::class, 'AdminPassword'])->name('admin.password');
    Route::post('/update/admin/password', [AdminController::class, 'UpdateAdminPassword'])->name('update.admin.password');


});


// Brans section

Route::middleware('auth:admin')->prefix('brands')->group(function () {

    Route::get('/all', [BrandController::class, 'AllBrand'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'StoreBrand'])->name('store.brand');
    Route::post('/update', [BrandController::class, 'UpdateBrand'])->name('update.brand');
    Route::get('/delete/{id}', [BrandController::class, 'DeleteBrand'])->name('delete.brand');

    // Active-inActive
    Route::get('/inactive-brand/{id}',[BrandController::class, 'InactiveBrand'])->name('inactive.brand');
    Route::get('/active-brand/{id}',[BrandController::class, 'ActiveBrand'])->name('active.brand');

});

// Banner section

Route::middleware('auth:admin')->prefix('banners')->group(function () {

    Route::get('/all', [BannerController::class, 'AllBanner'])->name('all.banner');
    Route::post('/store', [BannerController::class, 'StoreBanner'])->name('store.banner');
    Route::post('/update', [BannerController::class, 'UpdateBanner'])->name('update.banner');
    Route::get('/delete/{id}', [BannerController::class, 'DeleteBanner'])->name('delete.banner');


    // Active-inActive
    Route::get('/inactive-banner/{id}',[BannerController::class, 'InactiveBanner'])->name('inactive.banner');
    Route::get('/active-banner/{id}',[BannerController::class, 'ActiveBanner'])->name('active.banner');

});

//Category Controller
Route::middleware('auth:admin')->prefix('category')->group(function () {

    Route::get('/all', [CategoryController::class, 'AllCategory'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'StoreCategory'])->name('store.category');
    Route::post('/update', [CategoryController::class, 'UpdateCategory'])->name('update.category');
    Route::get('/delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');

    // Active-inActive
    Route::get('/inactive-category/{id}',[CategoryController::class, 'InactiveCategory'])->name('inactive.category');
    Route::get('/active-category/{id}',[CategoryController::class, 'ActiveCategory'])->name('active.category');


});

// SubCategory Controller
Route::middleware('auth:admin')->group(function () {

    Route::get('/all/subcategory', [SubCategoryController::class, 'AllSubCategory'])->name('all.subcategory');
    Route::post('/store/subcategory', [SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');
    Route::post('/updata/subcategory', [SubCategoryController::class, 'UpdateSubCategory'])->name('updata.subcategory');
    Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');

    // Active-inActive
    Route::get('/inactive-subcategory/{id}',[SubCategoryController::class, 'InactiveSubCategory'])->name('inactive.subcategory');
    Route::get('/active-subcategory/{id}',[SubCategoryController::class, 'ActiveSubCategory'])->name('active.subcategory');

    //GetSubCategory
    Route::get('/subcategory/ajax/{category_id}',  [SubCategoryController::class,'GetSubCategory']);

});

// Child Controller
Route::middleware('auth:admin')->group(function () {

    Route::get('/all/child', [ChildController::class, 'AllChild'])->name('all.child');
    Route::post('/store/childcategory', [ChildController::class, 'StoreChildCategory'])->name('store.childcategory');
    Route::post('/update/childcategory', [ChildController::class, 'UpdateChildCategory'])->name('update.childcategory');
    Route::get('/delete/childcategory/{id}', [ChildController::class, 'DeleteChildCategory'])->name('delete.childcategory');

    // Active-inActive
    Route::get('/inactive-childcategory/{id}',[ChildController::class, 'InactiveChildCategory'])->name('inactive.childcategory');
    Route::get('/active-childcategory/{id}',[ChildController::class, 'ActiveChildCategory'])->name('active.childcategory');

});

// Child Controller
Route::middleware('auth:admin')->group(function () {

    Route::get('/all/product', [ProductController::class, 'AllProduct'])->name('all.product');
    Route::get('/add/product', [ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store/product', [ProductController::class, 'StoreProduct'])->name('store.product');
    Route::get('/edit/product/{id}', [ProductController::class, 'EditProduct'])->name('edit.product');
    Route::post('/update/product', [ProductController::class, 'UpdateProduct'])->name('update.product');
    Route::get('/delete/product/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.product');

    // multi image add
    Route::post('/add/new/multiimage', [ProductController::class, 'AddNewMultiimage'])->name('add.new.multiimage');
    Route::get('/delete/multiimage/{id}', [ProductController::class, 'DeleteMultiimage'])->name('delete.multiimage');


    // Active inactive
    Route::get('/inactive/product/{id}', [ProductController::class, 'InactiveProduct'])->name('inactive.product');
    Route::get('/active/product/{id}', [ProductController::class, 'ActiveProduct'])->name('active.product');




    Route::get('/district-get/ajax/{category_id}', [ProductController::class, 'SubCategoryAjax']);

    Route::get('/state-get/ajax/{subcategory_id}', [ProductController::class,'GetChildCategories']);


});
