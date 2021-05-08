<?php

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

Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');

// danh muc san pham - trang chu
Route::get('/danhmucsanpham/{cate_id}', 'CategoryProduct@show_category');
Route::get('/tinhtrangsanpham/{status_id}', 'CategoryProduct@show_status');
Route::get('/chitietsanpham/{prod_id}', 'ProductController@details_product');

// gio hang
Route::post('/save-cart', 'CartController@save_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::post('/update-quantity', 'CartController@update_quantity');

// tim kiem
Route::post('/tim-kiem','HomeController@search');

// admin
Route::get('/adminLogin','AdminController@adminLogin');
Route::get('/adminLogout','AdminController@adminLogout');
Route::get('/indexAdmin','AdminController@adminLayout');
Route::post('/login','Admincontroller@login');

// permission
Route::get('/dashboard','Admincontroller@dashboard');
Route::get('/delivery','Admincontroller@delivery');
Route::get('/inventory','Admincontroller@inventory');
Route::get('/order','Admincontroller@order');

// ------------------------------------------------------------------------------------------
// inventory managerment
// category
Route::get('/all-category','CategoryProduct@all_category');
Route::get('/add-category','CategoryProduct@add_category');
Route::get('/edit-category/{cate_id}','CategoryProduct@edit_category');
Route::post('/save-category','CategoryProduct@save_category');
Route::post('/update-category/{cate_id}','CategoryProduct@update_category');
Route::get('/delete-category/{cate_id}','CategoryProduct@delete_category');

// type
Route::get('/all-type','CategoryProduct@all_type');
Route::get('/add-type','CategoryProduct@add_type');
Route::get('/edit-type/{type_id}','CategoryProduct@edit_type');
Route::post('/save-type','CategoryProduct@save_type');
Route::post('/update-type/{type_id}','CategoryProduct@update_type');
Route::get('/delete-type/{type_id}','CategoryProduct@delete_type');

// status
Route::get('/all-status','CategoryProduct@all_status');
Route::get('/add-status','CategoryProduct@add_status');
Route::get('/edit-status/{status_id}','CategoryProduct@edit_status');
Route::post('/save-status','CategoryProduct@save_status');
Route::post('/update-status/{status_id}','CategoryProduct@update_status');
Route::get('/delete-status/{status_id}','CategoryProduct@delete_status');

// supplier
Route::get('/all-supplier','CategoryProduct@all_supplier');
Route::get('/add-supplier','CategoryProduct@add_supplier');
Route::get('/edit-supplier/{supplier_id}','CategoryProduct@edit_supplier');
Route::post('/save-supplier','CategoryProduct@save_supplier');
Route::post('/update-supplier/{supplier_id}','CategoryProduct@update_supplier');
Route::get('/delete-supplier/{supplier_id}','CategoryProduct@delete_supplier');

// author
Route::get('/all-author','CategoryProduct@all_author');
Route::get('/add-author','CategoryProduct@add_author');
Route::get('/edit-author/{author_id}','CategoryProduct@edit_author');
Route::post('/save-author','CategoryProduct@save_author');
Route::post('/update-author/{author_id}','CategoryProduct@update_author');
Route::get('/delete-author/{author_id}','CategoryProduct@delete_author');

// product
Route::get('/all-product','CategoryProduct@all_product');
Route::get('/add-product','CategoryProduct@add_product');
Route::get('/edit-product/{product_id}','CategoryProduct@edit_product');
Route::post('/save-product','CategoryProduct@save_product');
Route::post('/update-product/{product_id}','CategoryProduct@update_product');
Route::get('/delete-product/{product_id}','CategoryProduct@delete_product');
// end inventory
// -----------------------------------------------------------------------------------
// Admin managerment

// inventoryAdmin
// category
Route::get('/admin-all-category','adminManager@all_category');
Route::get('/admin-add-category','adminManager@add_category');
Route::get('/admin-edit-category/{cate_id}','adminManager@edit_category');
Route::post('/admin-save-category','adminManager@save_category');
Route::post('/admin-update-category/{cate_id}','adminManager@update_category');
Route::get('/admin-delete-category/{cate_id}','adminManager@delete_category');

// type
Route::get('/admin-all-type','adminManager@all_type');
Route::get('/admin-add-type','adminManager@add_type');
Route::get('/admin-edit-type/{type_id}','adminManager@edit_type');
Route::post('/admin-save-type','adminManager@save_type');
Route::post('/admin-update-type/{type_id}','adminManager@update_type');
Route::get('/admin-delete-type/{type_id}','adminManager@delete_type');

// status
Route::get('/admin-all-status','adminManager@all_status');
Route::get('/admin-add-status','adminManager@add_status');
Route::get('/admin-edit-status/{status_id}','adminManager@edit_status');
Route::post('/admin-save-status','adminManager@save_status');
Route::post('/admin-update-status/{status_id}','adminManager@update_status');
Route::get('/admin-delete-status/{status_id}','adminManager@delete_status');

// supplier
Route::get('/admin-all-supplier','adminManager@all_supplier');
Route::get('/admin-add-supplier','adminManager@add_supplier');
Route::get('/admin-edit-supplier/{supplier_id}','adminManager@edit_supplier');
Route::post('/admin-save-supplier','adminManager@save_supplier');
Route::post('/admin-update-supplier/{supplier_id}','adminManager@update_supplier');
Route::get('/admin-delete-supplier/{supplier_id}','adminManager@delete_supplier');

// author
Route::get('/admin-all-author','adminManager@all_author');
Route::get('/admin-add-author','adminManager@add_author');
Route::get('/admin-edit-author/{author_id}','adminManager@edit_author');
Route::post('/admin-save-author','adminManager@save_author');
Route::post('/admin-update-author/{author_id}','adminManager@update_author');
Route::get('/admin-delete-author/{author_id}','adminManager@delete_author');

// product
Route::get('/admin-all-product','adminManager@all_product');
Route::get('/admin-add-product','adminManager@add_product');
Route::get('/admin-edit-product/{product_id}','adminManager@edit_product');
Route::post('/admin-save-product','adminManager@save_product');
Route::post('/admin-update-product/{product_id}','adminManager@update_product');
Route::get('/admin-delete-product/{product_id}','adminManager@delete_product');
// end inventoryAdmin

// order manager
Route::get('/admin-all-invoice', 'adminManager@all_invoice');
Route::get('/admin-edit-invoice/{invoice_id}','adminManager@edit_invoice');
Route::post('/admin-update-invoice/{invoice_id}','adminManager@update_status_invoice');

// delivery manager
Route::get('/admin-delivery-all-invoice', 'adminManager@admin_delivery_all_invoice');
Route::get('/admin-detail-invoice/{invoice_id}','adminManager@admin_detail_invoice');

// ------------------------------------------

// accountAdmin
Route::get('/admin-all-account','adminManager@all_account');
Route::get('/admin-add-account','adminManager@add_account');
Route::get('/admin-edit-account/{acc_id}','adminManager@edit_account');
Route::post('/admin-save-account','adminManager@save_account');
Route::post('/admin-update-account/{acc_id}','adminManager@update_account');
Route::get('/admin-delete-account/{acc_id}','adminManager@delete_account');
// end accountAdmin
// -----------------------------------------

// user profile
Route::get('/profile/{acc_id}','HomeController@user_profile');

// checkout
Route::get('/login-checkout', 'CheckoutController@login_checkout');
Route::post('/add-customer', 'CheckoutController@add_customer');
Route::get('/checkout/{acc_id}', 'CheckoutController@checkout');
Route::post('/save-checkout-customer', 'CheckoutController@save_checkout_customer');
Route::get('/payment', 'CheckoutController@payment');
Route::post('/order-place', 'CheckoutController@order_place');