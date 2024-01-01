<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\CategoryProduct;
use \App\Http\Controllers\BrandProduct;
use \App\Http\Controllers\SupplierController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ColorController;
use \App\Http\Controllers\SizeController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//frontend
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/trang-chu', [\App\Http\Controllers\HomeController::class, 'index']);

//Danh mục sản phẩm trang chủ
Route::get('/danhmuc-sanpham/{cate_id}', [CategoryProduct::class, 'show_cate_home']);
//Thương hiệu sản phẩm trang chủ
Route::get('/thuonghieu-sanpham/{brand_id}', [BrandProduct::class, 'show_brand_home']);
//Chi tiết sản phẩm trang chủ
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product']);
// ajax
Route::get('/ajax_warehouse_quantity', [ProductController::class, 'ajax_warehouse_quantity'])->name('detail.ajax_warehouse_quantity');


//backend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//Category Product
Route::get('/add-category', [CategoryProduct::class, 'add_category']);
Route::get('/edit-category/{cate_id}', [CategoryProduct::class, 'edit_category']);
Route::get('/delete-category/{cate_id}', [CategoryProduct::class, 'delete_category']);
Route::get('/all-category', [CategoryProduct::class, 'all_category']);

Route::get('/unactive-category/{cate_id}', [CategoryProduct::class, 'unactive_category']);
Route::get('/active-category/{cate_id}', [CategoryProduct::class, 'active_category']);

Route::post('/save-category', [CategoryProduct::class, 'save_category']);
Route::post('/update-category/{cate_id}', [CategoryProduct::class, 'update_category']);

//Brand Product
Route::get('/add-brand', [BrandProduct::class, 'add_brand']);
Route::get('/edit-brand/{brand_id}', [BrandProduct::class, 'edit_brand']);
Route::get('/delete-brand/{brand_id}', [BrandProduct::class, 'delete_brand']);
Route::get('/all-brand', [BrandProduct::class, 'all_brand']);

Route::get('/unactive-brand/{brand_id}', [BrandProduct::class, 'unactive_brand']);
Route::get('/active-brand/{brand_id}', [BrandProduct::class, 'active_brand']);

Route::post('/save-brand', [BrandProduct::class, 'save_brand']);
Route::post('/update-brand/{brand_id}', [BrandProduct::class, 'update_brand']);

//Supplier Product
Route::get('/add-sup', [SupplierController::class, 'add_sup']);
Route::get('/edit-sup/{sup_id}', [SupplierController::class, 'edit_sup']);
Route::get('/delete-sup/{sup_id}', [SupplierController::class, 'delete_sup']);
Route::get('/all-sup', [SupplierController::class, 'all_sup']);

Route::post('/save-sup', [SupplierController::class, 'save_sup']);
Route::post('/update-sup/{sup_id}', [SupplierController::class, 'update_sup']);

//Color-Size
Route::get('/add-color', [ColorController::class, 'add_color']);
Route::get('/edit-color/{color_id}', [ColorController::class, 'edit_color']);
Route::get('/delete-color/{color_id}', [ColorController::class, 'delete_color']);
Route::get('/all-color', [ColorController::class, 'all_color']);

Route::post('/save-color', [ColorController::class, 'save_color']);
Route::post('/update-color/{color_id}', [ColorController::class, 'update_color']);

Route::get('/add-size', [SizeController::class, 'add_size']);
Route::get('/edit-size/{size_id}', [SizeController::class, 'edit_size']);
Route::get('/delete-size/{size_id}', [SizeController::class, 'delete_size']);
Route::get('/all-size', [SizeController::class, 'all_size']);

Route::post('/save-size', [SizeController::class, 'save_size']);
Route::post('/update-size/{size_id}', [SizeController::class, 'update_size']);

//Product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/add-product-detail', [ProductController::class, 'add_product_detail']);

Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);

Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);

Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/save-product-detail', [ProductController::class, 'save_product_detail']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);

//Cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);

//Checkout
Route::post('/login', [CheckoutController::class, 'login']);
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::get('/show-checkout', [CheckoutController::class, 'show_checkout']);
Route::post('/add-user', [CheckoutController::class, 'add_user']);
