<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
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



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//============Admin============//

Route::group(['prefix' => 'admin','middleware' =>['auth','admin'],'namespace' => 'Admin'], function() {
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::post('update/profile',[AdminController::class,'update_profile'])->name('update.profile.admin');
    Route::get('image/update/view',[AdminController::class,'image_update_view'])->name('admin.image.change.view');
    Route::post('image/update',[AdminController::class,'image_update'])->name('admin.image.update');
    Route::get('password/update/view',[AdminController::class,'password_update_view'])->name('admin.password.change.view');
    Route::post('password/update',[AdminController::class,'password_update'])->name('admin.password.update');

    //========Brand=======
    Route::get('all_brand',[BrandController::class,'index'])->name('brand');
    Route::post('add_brand',[BrandController::class,'add_brand'])->name('add.brand');
    Route::get('edit_brand/{id}',[BrandController::class,'edit'])->name('edit.brand');
    Route::post('update_brand',[BrandController::class,'update_brand'])->name('update.brand');
    Route::get('delete_brand/{id}',[BrandController::class,'delete'])->name('delete.brand');

    //========Category=======

    Route::get('category/all',[CategoryController::class,'index'])->name('category');
    Route::post('add_category',[CategoryController::class,'add_category'])->name('add.category');
    Route::get('edit_category/{id}',[CategoryController::class,'edit'])->name('edit.category');
    Route::post('update_category',[CategoryController::class,'update_category'])->name('update.category');
    Route::get('delete_category/{id}',[CategoryController::class,'delete'])->name('delete.category');

    //========Sub_Category=======

    Route::get('sub_category/all',[CategoryController::class,'sub_index'])->name('sub.category');
    Route::post('add_sub_category',[CategoryController::class,'add_sub_category'])->name('add.sub.category');
    Route::get('edit_sub_category/{id}',[CategoryController::class,'edit_sub_category'])->name('edit.sub.category');
    Route::post('update_sub_category',[CategoryController::class,'update_sub_category'])->name('update.sub.category');
    Route::get('delete_sub_category/{id}',[CategoryController::class,'delete_sub_category'])->name('delete.sub.category');

    //========Sub_Sub_Category=======

    Route::get('sub_sub_category/all',[CategoryController::class,'sub_sub_index'])->name('sub.sub.category');
    Route::post('add_sub_sub_category',[CategoryController::class,'add_sub_sub_category'])->name('add.sub.sub.category');
     Route::get('edit_sub_sub_category/{id}',[CategoryController::class,'edit_sub_sub_category'])->name('edit.sub.sub.category');
    Route::post('update_sub_sub_category',[CategoryController::class,'update_sub_sub_category'])->name('update.sub.sub.category');
    Route::get('delete_sub_sub_category/{id}',[CategoryController::class,'delete_sub_sub_category'])->name('delete.sub.sub.category');
    //====Finding Sub Category===//
    Route::get('sub_category/ajax/{id}',[CategoryController::class,'get_sub_cat']); 
    //====Finding Sub Sub Category===//
    Route::get('sub_sub_category/ajax/{id}',[CategoryController::class,'get_sub_sub_cat']); 


    //========Product=======
    Route::get('product/form',[ProductController::class,'form_product'])->name('form.product');
    Route::post('product/add',[ProductController::class,'store_product'])->name('add.product');
    Route::get('product/manage',[ProductController::class,'manage_product'])->name('manage.product');
    Route::get('product/edit/{id}',[ProductController::class,'edit_product'])->name('edit.product');
    Route::post('product/update',[ProductController::class,'update_product'])->name('update.product');
    Route::get('product/delete/{id}',[ProductController::class,'delete_product'])->name('delete.product');
    Route::post('product/change_multi_img',[ProductController::class,'change_multi_img'])->name('change.multi.img');
    Route::post('product/change_main_img',[ProductController::class,'change_main_img'])->name('change.main.img');

    Route::get('product/delete_multi_img/{id}',[ProductController::class,'delete_multi_img'])->name('multi.img.delete');
    Route::get('product/change_active_product_status/{id}',[ProductController::class,'change_active_product_status'])->name('active.product.status');
    Route::get('product/change_inactive_product_status/{id}',[ProductController::class,'change_inactive_product_status'])->name('inactive.product.status');

//========Slider=======
    
    Route::get('all_slider',[SliderController::class,'index'])->name('slider');
    Route::post('add_slider',[SliderController::class,'add_slider'])->name('add.slider');
    Route::get('edit_slider/{id}',[SliderController::class,'edit'])->name('edit.slider');
    Route::post('update_slider',[SliderController::class,'update_slider'])->name('update.slider');
    Route::get('delete_slider/{id}',[SliderController::class,'delete'])->name('delete.slider');
     Route::get('slider/change_active_slider_status/{id}',[SliderController::class,'change_active_slider_status'])->name('active.slider.status');
    Route::get('slider/change_inactive_slider_status/{id}',[SliderController::class,'change_inactive_slider_status'])->name('inactive.slider.status');


});

//============User============//
Route::group(['prefix' => 'user','middleware' =>['auth','user'],'namespace' => 'User'], function() {
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('update/profile',[UserController::class,'update_profile'])->name('update.profile');
    Route::get('image/update/view',[UserController::class,'image_update_view'])->name('image.change.view');
    Route::post('image/update',[UserController::class,'image_update'])->name('user.image.update');
    Route::get('password/update/view',[UserController::class,'password_update_view'])->name('password.change.view');
    Route::post('password/update',[UserController::class,'password_update'])->name('user.password.update');
});



//============Frontend============//
Route::get('/',[IndexController::class,'index']);
Route::get('language/english',[LanguageController::class,'english'])->name('english.language');
Route::get('language/bangla',[LanguageController::class,'bangla'])->name('bangla.language');
Route::get('single_product/{id}/{slug}',[IndexController::class,'single_product']);
Route::get('tag_product/{tag}',[IndexController::class,'tag_product'])->name('tag.product');
// Route::get('category_product/{id}',[IndexController::class,'category_product'])->name('category.product');
Route::get('sub_category_product/{id}',[IndexController::class,'sub_category_product'])->name('sub.category.product');
Route::get('sub_sub_category_product/{id}',[IndexController::class,'sub_sub_category_product'])->name('sub.sub.category.product');
//=====Cart=====//
Route::get('product/details/addTocart/{id}',[IndexController::class,'product_details_addTocart']);
Route::post('cart/data/store/{id}',[CartController::class,'addTocart']);








