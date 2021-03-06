<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishlistController;
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


///===========Coupon==========//////
    Route::get('coupon',[CouponController::class,'index'])->name('coupon'); 
    Route::post('add_coupon',[CouponController::class,'add_coupon'])->name('add.coupon');
    Route::get('edit_coupon/{id}',[CouponController::class,'edit'])->name('edit.coupon');
    Route::post('update_coupon',[CouponController::class,'update_coupon'])->name('update.coupon');
    Route::get('delete_coupon/{id}',[CouponController::class,'delete'])->name('delete.coupon');

///===========Shipping Area==========//////
    Route::get('division',[ShippingAreaController::class,'add_division'])->name('division');
    Route::post('add/division',[ShippingAreaController::class,'store_division'])->name('add.division');
    Route::get('edit_division/{id}',[ShippingAreaController::class,'edit_division'])->name('edit.division');
    Route::post('update_division',[ShippingAreaController::class,'update_division'])->name('update.division');
    Route::get('delete_division/{id}',[ShippingAreaController::class,'delete_division'])->name('delete.division');


    Route::get('district',[ShippingAreaController::class,'add_district'])->name('district');
    Route::post('add/district',[ShippingAreaController::class,'store_district'])->name('add.district');
     Route::get('edit_district/{id}',[ShippingAreaController::class,'edit_district'])->name('edit.district');
     Route::post('update_district',[ShippingAreaController::class,'update_district'])->name('update.district');
    Route::get('delete_district/{id}',[ShippingAreaController::class,'delete_district'])->name('delete.district');


    Route::get('state',[ShippingAreaController::class,'add_state'])->name('state');
    Route::get('ajax/request/get_district/{id}',[ShippingAreaController::class,'ajax_get_district']);
    Route::post('add/state',[ShippingAreaController::class,'store_state'])->name('add.state');
     Route::get('edit_state/{id}',[ShippingAreaController::class,'edit_state'])->name('edit.state');
     Route::post('update_state',[ShippingAreaController::class,'update_state'])->name('update.state');
    Route::get('delete_state/{id}',[ShippingAreaController::class,'delete_state'])->name('delete.state');
});

//============User============//
Route::group(['prefix' => 'user','middleware' =>['auth','user'],'namespace' => 'User'], function() {
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('update/profile',[UserController::class,'update_profile'])->name('update.profile');
    Route::get('image/update/view',[UserController::class,'image_update_view'])->name('image.change.view');
    Route::post('image/update',[UserController::class,'image_update'])->name('user.image.update');
    Route::get('password/update/view',[UserController::class,'password_update_view'])->name('password.change.view');
    Route::post('password/update',[UserController::class,'password_update'])->name('user.password.update');

    ////====Checkout====////
    
    Route::get('district-get/ajax/{id}',[CheckoutController::class,'get_district_ajax']);
    Route::get('state-get/ajax/{id}',[CheckoutController::class,'get_state_ajax']);
    Route::post('checkout/store',[CheckoutController::class,'checkout_store'])->name('user.checkout.store');

    Route::post('stripe', [CheckoutController::class, 'stripePost'])->name('stripe.post');
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
Route::get('cart/data/read',[CartController::class,'data_read']);
Route::get('my_cart/data/read',[CartController::class,'my_cart_data_read']);
Route::get('cart/data/remove/{id}',[CartController::class,'data_remove']);
Route::get('mycart',[CartController::class,'my_cart'])->name('my.cart');
Route::get('cart/item/increment/{id}',[CartController::class,'cart_item_increment']);
Route::get('cart/item/decrement/{id}',[CartController::class,'cart_item_decrement']);
//===[wishlist]====//
Route::get('wishlist/data/store/{id}',[WishlistController::class,'addToWishlist']);
Route::get('wishlist',[WishlistController::class,'index'])->name('wishlist'); 
Route::get('wishlist/data/read',[WishlistController::class,'data_read']);
Route::get('wishlist/data/remove/{id}',[WishlistController::class,'data_remove']);
//===Coupon===///
Route::post('apply/coupon',[WishlistController::class,'apply_coupon']);
Route::get('calculation/coupon',[WishlistController::class,'calculation_coupon']);
Route::get('coupon/remove',[WishlistController::class,'coupon_remove']);

//===Checkout===//

Route::get('user/checkout',[CartController::class,'user_checkout'])->name('user.checkout');



//===//








