<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VideosController;
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

//============= This is the Auth controller

Route::get('/login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'auth_login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('article/{id}', [HomeController::class, 'Article'])->name('Article');

//============= This is the admin controller

Route::group(['prefix' => '/panel/dashboard', 'middleware' => ['auth']], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    //================== User ==================
    //disable
   /*  Route::get('/user/{id}', [UsersController::class, 'disable']); */

    Route::get('/users', [UsersController::class, 'index_user'])->name('user.index');
    Route::get('/users/create', [UsersController::class, 'create_user'])->name('user.create');
    Route::post('/users/store', [UsersController::class, 'store_user'])->name('user.store');
    Route::delete('/delete/users', [UsersController::class, 'destroy_users']);
    Route::get('/users/edit/{id}', [UsersController::class, 'edit_user'])->name('user.edit');
    Route::post('/users/update/{id}', [UsersController::class, 'update_users'])->name('user.update');
    Route::get('/users/view/{id}', [UsersController::class, 'view_users'])->name('user.view');
    /* Profile */
    Route::get('/profile', [ProfileController::class, 'index_profile'])->name('profile.index');
    Route::post('/change_password', [ProfileController::class, 'changePassword'])->name('profile.change_password');
    

    //================= Permission ==================
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::delete('/permission/delete', [PermissionController::class, 'delete']);
    Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');

    //================== Role ==================
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role/delete', [RoleController::class, 'delete'])->name('role.delete');


    //================= Promotional ================== 
    Route::get('/promotional', [PromotionalController::class, 'index_promotional'])->name('promotional.index');
    Route::get('/promotional/create', [PromotionalController::class, 'create_promotional'])->name('promotional.create');
    Route::post('/promotional/store', [PromotionalController::class, 'store_promotional'])->name('promotional.store');
    Route::get('/promotional/edit/{id}', [PromotionalController::class, 'edit_promotional'])->name('promotional.edit');
    Route::put('/promotional/update/{id}', [PromotionalController::class, 'update_promotional'])->name('promotional.update');
    Route::delete('/promotional/delete', [PromotionalController::class, 'delete_promotional'])->name('promotional.delete');
    Route::get('/promotional/view/{id}', [PromotionalController::class, 'view_promotional'])->name('promotional.view');
    Route::post('/search/promotional/', [PromotionalController::class, 'SearchPromo'])->name('promotional.search');
    Route::get('/promotional/{id}', [PromotionalController::class, 'disable']);

    //================= Price ==================
    Route::get('/prices', [PriceController::class, 'index_prices'])->name('prices.index');
    Route::get('/prices/create', [PriceController::class, 'create_prices'])->name('prices.create');
    Route::post('/prices/store', [PriceController::class, 'store_prices'])->name('prices.store');
    Route::get('/prices/edit/{id}', [PriceController::class, 'edit_prices'])->name('prices.edit');
    Route::put('/prices/update/{id}', [PriceController::class, 'update_prices'])->name('prices.update');
    Route::delete('/prices/delete', [PriceController::class, 'delete_prices'])->name('prices.delete');
    Route::get('/prices/view/{id}', [PriceController::class, 'view_prices'])->name('prices.view');
    //
    Route::post('/import-excel', [PriceController::class, 'importExcel']);
    /*    Route::post('/records/delete', [PriceController::class, 'deleteMultiple']); */
    Route::post('/prices/delete_all', [PriceController::class, 'multiDelete'])->name('prices.delete_all');

    //=================  Category ==================

    Route::get('/category', [CategoryController::class, 'index_category'])->name('course_cate.index');
    Route::get('/category/create', [CategoryController::class, 'create_category'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store_category'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit_category'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update_category'])->name('category.update');
    Route::delete('/category/delete', [CategoryController::class, 'delete_category'])->name('category.delete');
    Route::get('/category/view/{id}', [CategoryController::class, 'view_category'])->name('category.view');

    //================= Posts  ==================

    Route::get('/posts', [PostsController::class, 'index_posts'])->name('posts.index');
    Route::get('/posts/create', [PostsController::class, 'create_posts'])->name('posts.create');
    Route::post('/posts/store', [PostsController::class, 'store_posts'])->name('posts.store');
    Route::get('/posts/edit/{id}', [PostsController::class, 'edit_posts'])->name('posts.edit');
    Route::post('/upload', 'App\Http\Controllers\PostsController@upload')->name('ckeditor.upload');
    Route::post('upload_image', [PostsController::class, 'uploadImage'])->name('upload');
    Route::put('/posts/update/{id}', [PostsController::class, 'update_posts'])->name('posts.update');
    Route::delete('/posts/delete', [PostsController::class, 'delete_posts'])->name('posts.delete');
    Route::get('/posts/{id}', [PostsController::class, 'disable']);
    Route::get('/search/posts/', [PostsController::class, 'SearchPost'])->name('posts.search');

    /*Setting */
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/setting/store', [SettingController::class, 'store_setting'])->name('setting.store');
    Route::get('/setting/create', [SettingController::class, 'create_setting'])->name('setting.create');
    Route::get('/setting/edit/{id}', [SettingController::class, 'edit_setting'])->name('setting.edit');
    Route::post('/setting/update/{id}', [SettingController::class, 'update_setting'])->name('setting.update');
    Route::delete('/setting/delete', [SettingController::class, 'delete_setting'])->name('setting.delete');


    /* Index Trash */
    Route::get('/trash', [TrashController::class, 'index_Trash'])->name('trash.index');

    /* User Trash */
    Route::delete('/delete_user/{id}', [TrashController::class, 'delete_user'])->name('trash.delete_user');
    Route::post('/restore_user', [TrashController::class, 'restore_user'])->name('trash.restore_user');

    /* Permission Trash */
    Route::delete('/delete_Per/{id}', [TrashController::class, 'delete_per'])->name('trash.destroy_per');
    Route::post('/restore_permission', [TrashController::class, 'restore_per'])->name('trash.restore_per');


    /*   Category Trash */
    Route::delete('/delete_cate/{id}', [TrashController::class, 'delete_cate'])->name('trash.delete_cate');
    Route::post('/restore_cate', [TrashController::class, 'restor_cate'])->name('trash.restore_cate');

    /* Posts Trash */
    Route::delete('/trash_post/{id}', [TrashController::class, 'delete_post'])->name('trash.delete_post');
    Route::post('/restore_post', [TrashController::class, 'restore_post'])->name('trash.restore_post');
});

//================ Home_Master =====================
Route::group(['prefix' => '/',], function () {

    Route::get('/', [HomeController::class, 'index']);
});
