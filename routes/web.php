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
Route::view('barcode', 'barcode');

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    \App::setLocale($locale);
    return redirect()->back();
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear_cache', function () {
    \Artisan::call('route:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('config:clear');


});



Auth::routes();
Auth::routes(['verify' => true]);
Route::post('/update_profile', [App\Http\Controllers\ProfileController::class, 'update_employer_profile'])->name('update_profile');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->middleware('verified')->name('profile');
Route::get('/wallet', [App\Http\Controllers\ProfileController::class, 'wallet'])->name('wallet');

Route::post('/update_password', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('update_password');
Route::post('/update_customer', [App\Http\Controllers\ProfileController::class, 'update_profile'])->name('update_customer');
Route::post('/update_profile', [App\Http\Controllers\ProfileController::class, 'update_profile'])->name('update_profile');



Route::get('/verfied_login_code', [App\Http\Controllers\ProfileController::class, 'verfied_login_code'])->name('verfied_login_code');

Route::get('/admin', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin');
Route::get('/admin/papers', [App\Http\Controllers\PaperController::class, 'index'])->middleware('role:paper,index')->name('papers');
Route::get('/admin/papers/add', [App\Http\Controllers\PaperController::class, 'create'])->middleware('role:paper,index')->name('add-paper');
Route::post('/admin/papers/add', [App\Http\Controllers\PaperController::class, 'store_paper'])->middleware('role:paper,index')->name('add-paper');
Route::get('/admin/papers/edit/{id}', [App\Http\Controllers\PaperController::class, 'edit'])->middleware('role:paper,index')->name('edit-paper');
Route::post('/admin/papers/edit/{id}', [App\Http\Controllers\PaperController::class, 'update_paper'])->middleware('role:paper,index')->name('edit-paper');
Route::get('/admin/papers/delete/{id}', [App\Http\Controllers\PaperController::class, 'destroy'])->middleware('role:paper,index')->name('delete-paper');
Route::post('/admin/papers/update_price_for_price_list/{id}', [App\Http\Controllers\PaperController::class, 'update_price_for_price_list'])->middleware('role:paper,edit')->name('update_price_for_price_list');
Route::post('/admin/papers/update_name_for_paper/{id}', [App\Http\Controllers\PaperController::class, 'update_name_for_paper'])->middleware('role:paper,edit')->name('update_name_for_paper');


Route::get('/admin/papers/paper-types', [App\Http\Controllers\PaperController::class, 'papers_type'])->middleware('role:paper,index')->name('paper-types');
Route::get('/admin/papers/add-paper-type', [App\Http\Controllers\PaperController::class, 'add_paper_type'])->middleware('role:paper,add')->name('add-paper-type');
Route::post('/admin/papers/add-paper-type', [App\Http\Controllers\PaperController::class, 'store_paper_type'])->middleware('role:paper,add')->name('add-paper-type');
Route::get('/admin/papers/edit-paper-type/{id}', [App\Http\Controllers\PaperController::class, 'edit_paper_type'])->middleware('role:paper,edit')->name('edit-paper-type');
// Route::get('/admin/papers/paper-price-list/{id}', [App\Http\Controllers\PaperController::class, 'paper_price_list'])->middleware('role:paper,index')->name('paper-price-list');
Route::post('/admin/papers/edit-paper-type/{id}', [App\Http\Controllers\PaperController::class, 'update_paper_type'])->middleware('role:paper,edit')->name('update-paper-type');
Route::get('/admin/papers/delete-paper-type/{id}', [App\Http\Controllers\PaperController::class, 'delete_paper_type'])->middleware('role:paper,delete')->name('delete-paper-type');



Route::get('/admin/order_status', [App\Http\Controllers\AdminController::class, 'order_status'])->middleware('role:order_status,index')->name('order_status');
Route::get('/admin/order_status/add-order-status', [App\Http\Controllers\AdminController::class, 'add_order_status'])->middleware('role:order_status,add')->name('add-order-status');
Route::post('/admin/order_status/add-order-status', [App\Http\Controllers\AdminController::class, 'store_order_status'])->middleware('role:order_status,add')->name('add-order-status');
Route::get('/admin/order_status/edit-order-status/{id}', [App\Http\Controllers\AdminController::class, 'edit_order_status'])->middleware('role:order_status,edit')->name('edit-order-status');
// Route::get('/admin/order_status/order_status-price-list/{id}', [App\Http\Controllers\AdminController::class, 'paper_price_list'])->middleware('role:order_status,index')->name('order_status-price-list');
Route::post('/admin/order_status/edit-order-status/{id}', [App\Http\Controllers\AdminController::class, 'update_order_status'])->middleware('role:order_status,edit')->name('update-order-status');
Route::get('/admin/order_status/delete-order-status/{id}', [App\Http\Controllers\AdminController::class, 'delete_order_status'])->middleware('role:order_status,delete')->name('delete-order-status');




// price list
Route::get('/admin/price_list/{id}', [App\Http\Controllers\PaperController::class, 'paper_price_list'])->middleware('role:paper,index')->name('paper-price-list');
Route::get('/admin/price_list/add/{id}', [App\Http\Controllers\PaperController::class, 'create_price_list'])->middleware('role:paper,add')->name('add-price-list');
Route::post('/admin/price_list/add/{id}', [App\Http\Controllers\PaperController::class, 'store_price_list'])->middleware('role:paper,add')->name('add-price-list');
Route::get('/admin/price_list/delete/{id}', [App\Http\Controllers\PaperController::class, 'destroy_price_list'])->middleware('role:paper,delete')->name('delete-price-list');
Route::get('/admin/price_list/edit/{id}', [App\Http\Controllers\PaperController::class, 'edit_price_list'])->middleware('role:paper,edit')->name('edit-price-list');
Route::post('/admin/price_list/edit/{id}', [App\Http\Controllers\PaperController::class, 'update_price_list'])->middleware('role:paper,edit')->name('update-price-list');


Route::get('/admin/paper_slices', [App\Http\Controllers\PaperController::class, 'paper_slices'])->middleware('role:paper,index')->name('paper_slices');
Route::get('/admin/paper_slices/add', [App\Http\Controllers\PaperController::class, 'create_paper_slices'])->middleware('role:paper,add')->name('add-paper-slice');
Route::post('/admin/paper_slices/add', [App\Http\Controllers\PaperController::class, 'store_paper_slice'])->middleware('role:paper,add')->name('add-paper-slice');
Route::get('/admin/paper_slices/delete/{id}', [App\Http\Controllers\PaperController::class, 'destroy_paper_slice'])->middleware('role:paper,delete')->name('delete-paper-slice');
Route::get('/admin/paper_slices/edit-paper-slice/{id}', [App\Http\Controllers\PaperController::class, 'edit_paper_slice'])->middleware('role:paper,edit')->name('edit-paper-slice');
Route::post('/admin/paper_slices/edit-paper-slice/{id}', [App\Http\Controllers\PaperController::class, 'update_paper_slice'])->middleware('role:paper,edit')->name('update-paper-slice');




Route::get('/admin/cover_types', [App\Http\Controllers\PaperController::class, 'cover_types'])->middleware('role:paper,index')->name('cover_types');
Route::get('/admin/cover_types/add', [App\Http\Controllers\PaperController::class, 'create_cover_type'])->middleware('role:paper,add')->name('add-cover-type');
Route::post('/admin/cover_types/add', [App\Http\Controllers\PaperController::class, 'store_cover_type'])->middleware('role:paper,add')->name('add-cover-type');
Route::get('/admin/cover_types/delete/{id}', [App\Http\Controllers\PaperController::class, 'destroy_cover_type'])->middleware('role:paper,delete')->name('delete-cover-type');
Route::get('/admin/cover_types/edit-cover-type/{id}', [App\Http\Controllers\PaperController::class, 'edit_cover_type'])->middleware('role:paper,edit')->name('edit-cover-type');
Route::post('/admin/cover_types/edit-cover-type/{id}', [App\Http\Controllers\PaperController::class, 'update_cover_type'])->middleware('role:paper,edit')->name('update-cover-type');

Route::get('/admin/holding_orders', [App\Http\Controllers\AdminController::class, 'holding_orders'])->name('holding_orders');


Route::get('/admin/aorders', [App\Http\Controllers\AdminController::class, 'orders'])->middleware('role:order,index')->name('aorders');
Route::get('/admin/show_aorder/{id}', [App\Http\Controllers\AdminController::class, 'show_order'])->middleware('role:order,index')->name('show_aorder');
Route::post('/admin/achange_order_status/{id}', [App\Http\Controllers\AdminController::class, 'change_order_status'])->middleware('role:order,edit')->name('achange_order_status');
Route::post('/admin/assgined_to/{id}', [App\Http\Controllers\AdminController::class, 'assgined_to'])->middleware('role:order,edit')->name('assgined_to');
Route::post('/admin/assgined_to_printer/{id}', [App\Http\Controllers\AdminController::class, 'assgined_to_printer'])->middleware('role:order,edit')->name('assgined_to_printer');
Route::post('/admin/assgined_to_driver/{id}', [App\Http\Controllers\AdminController::class, 'assgined_to_driver'])->middleware('role:order,edit')->name('assgined_to_driver');
Route::get('/admin/delete_aorder/{id}', [App\Http\Controllers\AdminController::class, 'delete_order'])->middleware('role:order,delete')->name('delete_aorder');
Route::post('/admin/orders/add_note', [App\Http\Controllers\AdminController::class, 'add_note'])->middleware('role:order,edit')->name('add_note');

Route::get('/admin/orders/export', [App\Http\Controllers\AdminController::class, 'export_orders'])->middleware('role:order,export')->name('export_orders');
Route::get('/admin/users/export', [App\Http\Controllers\AdminController::class, 'export_users'])->middleware('role:user,export')->name('export_users');
Route::post('/admin/multi_order_status_change', [App\Http\Controllers\AdminController::class, 'multi_order_status_change'])->middleware('role:order,edit')->name('multi_order_status_change');
Route::post('/admin/multi_order_printer', [App\Http\Controllers\AdminController::class, 'multi_order_printer'])->middleware('role:order,edit')->name('multi_order_printer');
Route::post('/admin/multi_order_cover', [App\Http\Controllers\AdminController::class, 'multi_order_cover'])->middleware('role:order,edit')->name('multi_order_cover');

Route::post('/admin/multi_invoce_status_change', [App\Http\Controllers\AdminController::class, 'multi_invoce_status_change'])->middleware('role:invoce,edit')->name('multi_invoce_status_change');


//Customers
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->middleware('role:user,index')->name('users');
Route::get('/admin/users/{id}', [App\Http\Controllers\AdminController::class, 'show_user'])->middleware('role:user,index')->name('show-user');
Route::post('/admin/users/{id}', [App\Http\Controllers\AdminController::class, 'update_user'])->middleware('role:user,edit')->name('update-user');
Route::get('/admin/add-user', [App\Http\Controllers\AdminController::class, 'add_user'])->middleware('role:user,add')->name('add-user');
Route::post('/admin/add-user', [App\Http\Controllers\AdminController::class, 'store_user'])->middleware('role:user,add')->name('add-user');

Route::get('/admin/delete-user/{id}', [App\Http\Controllers\AdminController::class, 'delete_user'])->middleware('role:user,delete')->name('delete-user');
Route::post('/admin/block-user/{id}', [App\Http\Controllers\AdminController::class, 'block_user'])->middleware('role:user,delete')->name('block-user');
Route::get('/admin/block-cancel/{id}', [App\Http\Controllers\AdminController::class, 'block_cancel'])->middleware('role:user,delete')->name('block-cancel');
// banners
Route::get('/admin/banners', [App\Http\Controllers\AdminController::class, 'banners'])->middleware('role:branch,index')->name('banners');
Route::get('/admin/banners/add', [App\Http\Controllers\AdminController::class, 'create_banner'])->middleware('role:branch,index')->name('add-banner');
Route::post('/admin/banners/add', [App\Http\Controllers\AdminController::class, 'store_banner'])->middleware('role:branch,index')->name('add-banner');
Route::get('/admin/banners/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit_banner'])->middleware('role:branch,index')->name('edit-banner');
Route::post('/admin/banners/add/{id}', [App\Http\Controllers\AdminController::class, 'update_banner'])->middleware('role:branch,index')->name('update-banner');


// branches
Route::get('/admin/branchs', [App\Http\Controllers\BranchController::class, 'index'])->middleware('role:branch,index')->name('branchs');
Route::get('/admin/branchs/add', [App\Http\Controllers\BranchController::class, 'create'])->middleware('role:branch,add')->name('add-branch');
Route::post('/admin/branchs/add', [App\Http\Controllers\BranchController::class, 'store'])->middleware('role:branch,add')->name('add-branch');
Route::get('/admin/branchs/edit/{id}', [App\Http\Controllers\BranchController::class, 'edit'])->middleware('role:branch,edit')->name('edit-branch');
Route::post('/admin/branchs/add/{id}', [App\Http\Controllers\BranchController::class, 'update'])->middleware('role:branch,edit')->name('update-branch');


// faqs
Route::get('/admin/faqs', [App\Http\Controllers\FaqController::class, 'index'])->middleware('role:faq,index')->name('faqs');
Route::get('/admin/faqs/add', [App\Http\Controllers\FaqController::class, 'create'])->middleware('role:faq,add')->name('add-faq');
Route::post('/admin/faqs/add', [App\Http\Controllers\FaqController::class, 'store'])->middleware('role:faq,add')->name('add-faq');
Route::get('/admin/faqs/edit/{id}', [App\Http\Controllers\FaqController::class, 'edit'])->middleware('role:faq,edit')->name('edit-faq');
Route::post('/admin/faqs/add/{id}', [App\Http\Controllers\FaqController::class, 'update'])->middleware('role:faq,edit')->name('update-faq');

//categories


Route::get('/admin/categories', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('role:category,index')->name('categories');
Route::get('/admin/categories/add', [App\Http\Controllers\CategoryController::class, 'create'])->middleware('role:category,add')->name('add-category');
Route::post('/admin/categories/add', [App\Http\Controllers\CategoryController::class, 'store'])->middleware('role:category,add')->name('add-category');
Route::get('/admin/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('role:category,delete')->name('delete-category');

Route::get('/admin/categories/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->middleware('role:category,edit')->name('edit-category');
Route::post('/admin/categories/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->middleware('role:category,edit')->name('update-category');



Route::get('/admin/products/', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/admin/products/add', [App\Http\Controllers\ProductController::class, 'create'])->name('add-product');
Route::post('/admin/products/add', [App\Http\Controllers\ProductController::class, 'store'])->name('add-product');
Route::get('/admin/products/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('delete-product');

Route::get('/admin/products/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->middleware('role:product,edit')->name('edit-product');
Route::post('/admin/products/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'update'])->middleware('role:product,edit')->name('update-product');

//coupons
Route::get('/admin/coupons/', [App\Http\Controllers\CouponController::class, 'index'])->middleware('role:coupon,index')->name('coupons');
Route::get('/admin/coupons/add', [App\Http\Controllers\CouponController::class, 'create'])->middleware('role:coupon,add')->name('add-coupon');
Route::post('/admin/coupons/add', [App\Http\Controllers\CouponController::class, 'store'])->middleware('role:coupon,add')->name('add-coupon');
Route::get('/admin/coupons/delete/{id}', [App\Http\Controllers\CouponController::class, 'destroy'])->middleware('role:coupon,delete')->name('delete-coupon');

Route::get('/admin/coupons/edit-coupon/{id}', [App\Http\Controllers\CouponController::class, 'edit'])->middleware('role:coupon,edit')->name('edit-coupon');
Route::post('/admin/coupons/edit-coupon/{id}', [App\Http\Controllers\CouponController::class, 'update'])->middleware('role:coupon,edit')->name('update-coupon');
//stickers

//list
Route::get('/admin/stickers/paper-type/', [App\Http\Controllers\StickerController::class, 'paper_types'])->middleware('role:sticker,index')->name('stickers-paper-type');
Route::get('/admin/stickers/paper-size/', [App\Http\Controllers\StickerController::class, 'paper_sizes'])->middleware('role:sticker,index')->name('stickers-paper-size');
Route::get('/admin/stickers/paper-shape/', [App\Http\Controllers\StickerController::class, 'paper_shapes'])->middleware('role:sticker,index')->name('stickers-paper-shape');
Route::get('/admin/stickers/price-list/', [App\Http\Controllers\StickerController::class, 'stickers_prices'])->middleware('role:sticker,index')->name('stickers-price-list');

//add

Route::get('/admin/stickers/add-paper-type/', [App\Http\Controllers\StickerController::class, 'add_paper_types'])->middleware('role:sticker,add')->name('add-stickers-paper-type');
Route::get('/admin/stickers/add-paper-size/', [App\Http\Controllers\StickerController::class, 'add_paper_sizes'])->middleware('role:sticker,add')->name('add-stickers-paper-size');
Route::get('/admin/stickers/add-paper-shape/', [App\Http\Controllers\StickerController::class, 'add_paper_shapes'])->middleware('role:sticker,add')->name('add-stickers-paper-shape');
Route::get('/admin/stickers/add-price-list/', [App\Http\Controllers\StickerController::class, 'add_stickers_prices'])->middleware('role:sticker,add')->name('add-stickers-price-list');
//store
Route::post('/admin/stickers/add-paper-type/', [App\Http\Controllers\StickerController::class, 'store_paper_types'])->middleware('role:sticker,add')->name('add-stickers-paper-type');
Route::post('/admin/stickers/add-paper-size/', [App\Http\Controllers\StickerController::class, 'store_paper_sizes'])->middleware('role:sticker,add')->name('add-stickers-paper-size');
Route::post('/admin/stickers/add-paper-shape/', [App\Http\Controllers\StickerController::class, 'store_paper_shapes'])->middleware('role:sticker,add')->name('add-stickers-paper-shape');
Route::post('/admin/stickers/add-price-list/', [App\Http\Controllers\StickerController::class, 'store_stickers_prices'])->middleware('role:sticker,add')->name('add-stickers-price-list');


//edit

Route::get('/admin/stickers/edit-paper-type/{id}', [App\Http\Controllers\StickerController::class, 'edit_paper_types'])->middleware('role:sticker,edit')->name('edit-stickers-paper-type');
Route::get('/admin/stickers/edit-paper-size/{id}', [App\Http\Controllers\StickerController::class, 'edit_paper_sizes'])->middleware('role:sticker,edit')->name('edit-stickers-paper-size');
Route::get('/admin/stickers/edit-paper-shape/{id}', [App\Http\Controllers\StickerController::class, 'edit_paper_shapes'])->middleware('role:sticker,edit')->name('edit-stickers-paper-shape');
Route::get('/admin/stickers/edit-price-list/{id}', [App\Http\Controllers\StickerController::class, 'edit_stickers_prices'])->middleware('role:sticker,edit')->name('edit-stickers-price-list');
//update

Route::post('/admin/stickers/edit-paper-type/{id}', [App\Http\Controllers\StickerController::class, 'update_paper_types'])->middleware('role:sticker,edit')->name('update-stickers-paper-type');
Route::post('/admin/stickers/edit-paper-size/{id}', [App\Http\Controllers\StickerController::class, 'update_paper_sizes'])->middleware('role:sticker,edit')->name('update-stickers-paper-size');
Route::post('/admin/stickers/edit-paper-shape/{id}', [App\Http\Controllers\StickerController::class, 'update_paper_shapes'])->middleware('role:sticker,edit')->name('update-stickers-paper-shape');
Route::post('/admin/stickers/edit-price-list/{id}', [App\Http\Controllers\StickerController::class, 'update_stickers_prices'])->middleware('role:sticker,edit')->name('update-stickers-price-list');


//personal_cards

//list
Route::get('/admin/personal_cards/card-type/', [App\Http\Controllers\PersonalCardController::class, 'card_types'])->middleware('role:personal_card,index')->name('personal_cards-card-type');
Route::get('/admin/personal_cards/card-size/', [App\Http\Controllers\PersonalCardController::class, 'card_sizes'])->middleware('role:personal_card,index')->name('personal_cards-card-size');
Route::get('/admin/personal_cards/card-shape/', [App\Http\Controllers\PersonalCardController::class, 'card_shapes'])->middleware('role:personal_card,index')->name('personal_cards-card-shape');
Route::get('/admin/personal_cards/price-list/', [App\Http\Controllers\PersonalCardController::class, 'personal_cards_prices'])->middleware('role:personal_card,index')->name('personal_cards-price-list');

//add

Route::get('/admin/personal_cards/add-card-type/', [App\Http\Controllers\PersonalCardController::class, 'add_card_types'])->middleware('role:personal_card,add')->name('add-personal_cards-card-type');
Route::get('/admin/personal_cards/add-card-size/', [App\Http\Controllers\PersonalCardController::class, 'add_card_sizes'])->middleware('role:personal_card,add')->name('add-personal_cards-card-size');
Route::get('/admin/personal_cards/add-card-shape/', [App\Http\Controllers\PersonalCardController::class, 'add_card_shapes'])->middleware('role:personal_card,add')->name('add-personal_cards-card-shape');
Route::get('/admin/personal_cards/add-price-list/', [App\Http\Controllers\PersonalCardController::class, 'add_personal_cards_prices'])->middleware('role:personal_card,add')->name('add-personal_cards-price-list');
//store
Route::post('/admin/personal_cards/add-card-type/', [App\Http\Controllers\PersonalCardController::class, 'store_card_types'])->middleware('role:personal_card,add')->name('add-personal_cards-card-type');
Route::post('/admin/personal_cards/add-card-size/', [App\Http\Controllers\PersonalCardController::class, 'store_card_sizes'])->middleware('role:personal_card,add')->name('add-personal_cards-card-size');
Route::post('/admin/personal_cards/add-card-shape/', [App\Http\Controllers\PersonalCardController::class, 'store_paper_shapes'])->middleware('role:personal_card,add')->name('add-personal_cards-shape');
Route::post('/admin/personal_cards/add-price-list/', [App\Http\Controllers\PersonalCardController::class, 'store_personal_cards_prices'])->middleware('role:personal_card,add')->name('add-personal_cards-price-list');


//edit

Route::get('/admin/personal_cards/edit-card-type/{id}', [App\Http\Controllers\PersonalCardController::class, 'edit_card_types'])->middleware('role:personal_card,edit')->name('edit-personal_cards-card-type');
Route::get('/admin/personal_cards/edit-card-size/{id}', [App\Http\Controllers\PersonalCardController::class, 'edit_card_sizes'])->middleware('role:personal_card,edit')->name('edit-personal_cards-card-size');
Route::get('/admin/personal_cards/edit-card-shape/{id}', [App\Http\Controllers\PersonalCardController::class, 'edit_card_shapes'])->middleware('role:personal_card,edit')->name('edit-personal_cards-card-shape');
Route::get('/admin/personal_cards/edit-price-list/{id}', [App\Http\Controllers\PersonalCardController::class, 'edit_personal_cards_prices'])->middleware('role:personal_card,edit')->name('edit-personal_cards-price-list');
//update

Route::post('/admin/personal_cards/edit-card-type/{id}', [App\Http\Controllers\PersonalCardController::class, 'update_card_types'])->middleware('role:personal_card,edit')->name('update-personal_cards-card-type');
Route::post('/admin/personal_cards/edit-card-size/{id}', [App\Http\Controllers\PersonalCardController::class, 'update_card_sizes'])->middleware('role:personal_card,edit')->name('update-personal_cards-card-size');
Route::post('/admin/personal_cards/edit-price-list/{id}', [App\Http\Controllers\PersonalCardController::class, 'update_personal_cards_prices'])->middleware('role:personal_card,edit')->name('update-personal_cards-price-list');

//rollup
Route::get('/admin/rollup/rollup-size/', [App\Http\Controllers\RollupController::class, 'rollup_sizes'])->middleware('role:rollup,index')->name('rollups-size');
Route::get('/admin/rollup/add-rollup-size/', [App\Http\Controllers\RollupController::class, 'add_rollup_sizes'])->middleware('role:rollup,add')->name('add-rollup-size');
Route::post('/admin/rollup/add-rollup-size/', [App\Http\Controllers\RollupController::class, 'store_rollup_sizes'])->middleware('role:rollup,add')->name('add-rollup-size');
Route::get('/admin/rollup/edit-rollup-size/{id}', [App\Http\Controllers\RollupController::class, 'edit_rollup_sizes'])->middleware('role:rollup,add')->name('edit-rollup-size');


//posters
Route::get('/admin/posters/posters-size/', [App\Http\Controllers\PosterController::class, 'posters_sizes'])->middleware('role:poster,index')->name('posters-size');
Route::get('/admin/posters/add-posters-size/', [App\Http\Controllers\PosterController::class, 'add_posters_sizes'])->middleware('role:poster,add')->name('add-posters-size');
Route::post('/admin/posters/add-posters-size/', [App\Http\Controllers\PosterController::class, 'store_posters_sizes'])->middleware('role:poster,add')->name('add-posters-size');
Route::get('/admin/posters/edit-posters-size/{id}', [App\Http\Controllers\PosterController::class, 'edit_posters_sizes'])->middleware('role:poster,edit')->name('edit-posters-size');


//setting
Route::get('/admin/settings', [App\Http\Controllers\SettingController::class, 'settings'])->name('settings');

Route::get('/admin/setting/{id}', [App\Http\Controllers\SettingController::class, 'setting'])->name('setting');
Route::post('/admin/setting/edit/{id}', [App\Http\Controllers\SettingController::class, 'edit_setting'])->name('edit-setting');





// print man

Route::get('/admin/printorders', [App\Http\Controllers\PrintManController::class, 'index'])->name('printorders');
Route::get('/admin/show_printporder/{id}', [App\Http\Controllers\PrintManController::class, 'show'])->name('show_printporder');
Route::post('/admin/printchange_order_status/{id}', [App\Http\Controllers\PrintManController::class, 'change_order_status'])->name('printchange_order_status');
Route::get('/admin/pending_printing_orders', [App\Http\Controllers\PrintManController::class, 'pending_orders'])->name('print_pending_orders');

//represntive

Route::get('/admin/reporders', [App\Http\Controllers\RepresentativeController::class, 'index'])->name('reporders');
Route::get('/admin/show_rporder/{id}', [App\Http\Controllers\RepresentativeController::class, 'show'])->name('show_rporder');
Route::post('/admin/rpchange_order_status/{id}', [App\Http\Controllers\RepresentativeController::class, 'change_order_status'])->name('rpchange_order_status');

Route::get('/admin/safer/orders', [App\Http\Controllers\SaferController::class, 'orders'])->name('safer_orders');


// drivers

Route::get('/admin/driverorders', [App\Http\Controllers\DriverController::class, 'index'])->name('driverorders');
Route::get('/admin/show_driverinvoce/{id}', [App\Http\Controllers\DriverController::class, 'show'])->name('show_driverinvoce');

Route::get('/admin/show_driverorder/{id}', [App\Http\Controllers\DriverController::class, 'show_order'])->name('show_driverorder');
Route::post('/admin/driverchange_order_status/{id}', [App\Http\Controllers\DriverController::class, 'change_order_status'])->name('driverchange_order_status');


// coverman

Route::get('/admin/coverorders', [App\Http\Controllers\CoverController::class, 'index'])->name('coverorders');
Route::get('/admin/show_coverorder/{id}', [App\Http\Controllers\CoverController::class, 'show'])->name('show_coverorder');
Route::post('/admin/coverchange_order_status/{id}', [App\Http\Controllers\CoverController::class, 'change_order_status'])->name('coverchange_order_status');
Route::get('/admin/pending_covers_orders', [App\Http\Controllers\CoverController::class, 'pending_orders'])->name('cover_pending_orders');



//site
Route::get('/product/{id}', [App\Http\Controllers\StoreController::class, 'product'])->name('product');
Route::post('/add_product_review/{id}', [App\Http\Controllers\StoreController::class, 'add_product_review'])->middleware('auth')->name('add_product_review');


//cart
Route::post('/addToCart', [App\Http\Controllers\CartController::class, 'store'])->name('add-to-cart');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->middleware('verified')->name('cart');
Route::post('/remove_from_cart', [App\Http\Controllers\CartController::class, 'destroy'])->name('remove_from_cart');
Route::post('/use_code', [App\Http\Controllers\CartController::class, 'use_code'])->name('use_code');
Route::post('/add_note', [App\Http\Controllers\CartController::class, 'add_note'])->name('add_note');
Route::post('/add_order_review/{id}', [App\Http\Controllers\OrderController::class, 'add_order_review'])->name('add_order_review');


//wishlist
Route::post('/addToWishlist', [App\Http\Controllers\WishlistController::class, 'store'])->name('add-to-wishlist');
Route::get('/wishlist', [App\Http\Controllers\WishlistController::class, 'index'])->name('cart');
Route::post('/remove_from_wishlist', [App\Http\Controllers\WishlistController::class, 'destroy'])->name('remove_from_wishlist');
Route::post('/address', [App\Http\Controllers\OrderController::class, 'address'])->name('address');
Route::post('/add_address', [App\Http\Controllers\OrderController::class, 'add_address'])->name('add_address');
Route::post('/remove_address', [App\Http\Controllers\OrderController::class, 'remove_address'])->name('remove_address');
Route::post('/confirm_address', [App\Http\Controllers\OrderController::class, 'confirm_address'])->name('confirm_address');
Route::post('/confirm_pay', [App\Http\Controllers\OrderController::class, 'confirm_pay'])->name('confirm_pay');
Route::post('/upload_transfer_file', [App\Http\Controllers\OrderController::class, 'upload_transfer_file'])->name('upload_transfer_file');

Route::post('/confirm_branch', [App\Http\Controllers\OrderController::class, 'confirm_branch'])->name('confirm_branch');

Route::post('/areas', [App\Http\Controllers\OrderController::class, 'areas'])->name('areas');



//site

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('siteproducts');


Route::get('/faqs', [App\Http\Controllers\HomeController::class, 'faqs'])->name('home_faqs');

//checkout

Route::get('/checkout/{order_id}', [App\Http\Controllers\CheckoutController::class, 'prepare_checkout'])->middleware('verified')->name('checkout');
Route::get('/checkpayment/{order_id}', [App\Http\Controllers\CheckoutController::class, 'check_payment'])->middleware('verified')->name('check_payment');

//order
Route::get('/createorder', [App\Http\Controllers\OrderController::class, 'store'])->middleware('verified')->name('createorder');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->middleware('verified')->name('checkout_page');
Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->middleware('verified')->name('orders');
Route::get('/order/{id}', [App\Http\Controllers\OrderController::class, 'show_order'])->middleware('verified')->name('show-order');
Route::get('/order/delete/{id}', [App\Http\Controllers\OrderController::class, 'delete_order'])->middleware('verified')->name('delete-order');

Route::get('/order/edit/{id}', [App\Http\Controllers\OrderController::class, 'edit_order'])->middleware('verified')->name('edit-order');



// profile
Route::post('/prpfile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->middleware('verified')->name('edit_profile');


Route::post('/prpfile/update', [App\Http\Controllers\ProfileController::class, 'update_profile'])->middleware('verified')->name('update_profile');



//store
Route::get('/store', [App\Http\Controllers\StoreController::class, 'index'])->name('store');

Route::get('/module_products/{id}', [App\Http\Controllers\StoreController::class, 'module_products'])->name('module_products');
Route::post('/getProductProp/{product_id}/{prop_id}', [App\Http\Controllers\StoreController::class, 'getProductProp'])->name('getProductProp');

//custom product
Route::get('/custom-product', [App\Http\Controllers\CustomProductController::class, 'create'])->name('custom-product');
Route::post('/upload_file_custom_product/{id}', [App\Http\Controllers\CustomProductController::class, 'upload_file_custom_product'])->name('upload_file_custom_product');
Route::post('/get_uploaded_files/{id}', [App\Http\Controllers\CustomProductController::class, 'get_uploaded_files'])->name('get_uploaded_files');
Route::post('/get_prop/{id}', [App\Http\Controllers\CustomProductController::class, 'get_prop'])->name('get_prop');
Route::post('/get_paper_type_prop/{id}/{paper_type}', [App\Http\Controllers\CustomProductController::class, 'get_paper_type_prop'])->name('get_paper_type_prop');
Route::post('/custom_productm/update_quantity', [App\Http\Controllers\CustomProductController::class, 'update_quantity'])->name('update_quantity');

Route::post('/set_prop/{id}', [App\Http\Controllers\CustomProductController::class, 'set_prop'])->name('set_prop');
Route::post('/set_cover/{id}', [App\Http\Controllers\CustomProductController::class, 'set_cover'])->name('set_cover');
Route::post('/delete_cover', [App\Http\Controllers\CustomProductController::class, 'delete_cover'])->name('delete_cover');
Route::post('/delete_file', [App\Http\Controllers\CustomProductController::class, 'delete_file'])->name('delete_file');
Route::post('/add_custom_product_to_cart/{id}', [App\Http\Controllers\CustomProductController::class, 'add_custom_product_to_cart'])->name('add_custom_product_to_cart');
Route::post('/split_file/{id}', [App\Http\Controllers\CustomProductController::class, 'split_file'])->name('split_file');
Route::post('/get_price_preview/{id}', [App\Http\Controllers\CustomProductController::class, 'get_price_preview'])->name('get_price_preview');
Route::post('/get_cover_price_preview/{id}', [App\Http\Controllers\CustomProductController::class, 'get_cover_price_preview'])->name('get_cover_price_preview');
Route::post('/get_total_price/{id}', [App\Http\Controllers\CustomProductController::class, 'get_total_price'])->name('get_total_price');
Route::post('/get_covers/{id}', [App\Http\Controllers\CustomProductController::class, 'get_covers'])->name('get_covers');

Route::post('/custom_product/order_file', [App\Http\Controllers\CustomProductController::class, 'order_file'])->name('order_file');
Route::get('/create-poster', [App\Http\Controllers\CustomProductController::class, 'create_poster'])->name('create-poster');
Route::post('/create-poster', [App\Http\Controllers\CustomProductController::class, 'add_poster_product'])->name('create-poster');
Route::post('/get-poster-price', [App\Http\Controllers\CustomProductController::class, 'get_poster_price'])->name('get-poster-price');

Route::post('/getLoader', [App\Http\Controllers\CustomProductController::class, 'getLoader'])->name('getLoader');





Route::get('/create-sticker', [App\Http\Controllers\CustomProductController::class, 'create_sticker'])->name('create-sticker');
Route::post('/create-sticker', [App\Http\Controllers\CustomProductController::class, 'add_sticker_product'])->name('create-sticker');
Route::post('/get-sticker-price', [App\Http\Controllers\CustomProductController::class, 'get_sticker_price'])->name('get-sticker-price');


Route::get('/create-personal-cart', [App\Http\Controllers\CustomProductController::class, 'create_personal_cart'])->name('create-personal-cart');
Route::post('/create-personal-cart', [App\Http\Controllers\CustomProductController::class, 'add_personal_card_product'])->name('create-personal-cart');
Route::post('/get-personal-cart-price', [App\Http\Controllers\CustomProductController::class, 'get_personal_cart_price'])->name('get-personal-cart-price');


Route::get('/create-rollup', [App\Http\Controllers\CustomProductController::class, 'create_rollup'])->name('create-rollup');
Route::post('/create-rollup', [App\Http\Controllers\CustomProductController::class, 'add_rollup_product'])->name('create-rollup');


Route::post('/custom-product/add_to_cart', [App\Http\Controllers\CustomProductController::class, 'add_custom_product_to_cart'])->name('add_custom_product_to_cart');


Route::post('/noti_json', [App\Http\Controllers\NotificationController::class, 'real_time_notification'])->name('noti_route');
Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications');



Route::get('/tickets', [App\Http\Controllers\TicketController::class, 'index'])->middleware('role:ticket,index')->name('tickets');
Route::get('/tickets/{id}', [App\Http\Controllers\TicketController::class, 'show_ticket'])->name('show_ticket');
Route::get('/tickets/add', [App\Http\Controllers\TicketController::class, 'add_ticket'])->name('add_ticket');
Route::post('/tickets/add', [App\Http\Controllers\TicketController::class, 'store_ticket'])->name('store_ticket');

Route::post('/tickets/send_message/{id}', [App\Http\Controllers\TicketController::class, 'send_message'])->name('send_message');

//employer chat

Route::get('/admin/chats', [App\Http\Controllers\ChatController::class, 'index'])->name('chats');
Route::get('/admin/chats/{id}', [App\Http\Controllers\ChatController::class, 'show'])->name('show_chat');
Route::get('/admin/chats/add', [App\Http\Controllers\ChatController::class, 'add_chat'])->name('add_chat');
Route::post('/admin/chats/add', [App\Http\Controllers\ChatController::class, 'store'])->name('store_chat');

Route::post('/chats/send_message/{id}', [App\Http\Controllers\ChatController::class, 'send_message'])->name('send_employer_message');



Route::get('/admin/blogs/', [App\Http\Controllers\AdminController::class, 'blogs'])->middleware('role:blog,index')->name('blogs');
Route::get('/admin/blogs/add', [App\Http\Controllers\AdminController::class, 'create_blog'])->middleware('role:blog,index')->name('add-blog');
Route::post('/admin/blogs/add', [App\Http\Controllers\AdminController::class, 'store_blog'])->middleware('role:blog,index')->name('add-blog');
Route::get('/admin/blogs/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy_blog'])->middleware('role:blog,index')->name('delete-blog');

Route::get('/admin/blogs/edit-blog/{id}', [App\Http\Controllers\AdminController::class, 'edit_blog'])->middleware('role:blog,index')->name('edit-blog');
Route::post('/admin/blogs/edit-blog/{id}', [App\Http\Controllers\AdminController::class, 'update_blog'])->middleware('role:blog,index')->name('update-blog');




Route::get('/admin/country', [App\Http\Controllers\AdminController::class, 'country'])->middleware('role:area,index')->name('country');
Route::get('/admin/country/add', [App\Http\Controllers\AdminController::class, 'create_country'])->middleware('role:area,add')->name('add-country');
Route::post('/admin/country/add', [App\Http\Controllers\AdminController::class, 'store_country'])->middleware('role:area,add')->name('add-country');
Route::get('/admin/country/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy_country'])->middleware('role:area,delete')->name('delete-country');

Route::get('/admin/country/edit-country/{id}', [App\Http\Controllers\AdminController::class, 'edit_country'])->middleware('role:area,edit')->name('edit-country');
Route::post('/admin/country/edit-country/{id}', [App\Http\Controllers\AdminController::class, 'update_country'])->middleware('role:area,edit')->name('update-country');

Route::get('/admin/areas/', [App\Http\Controllers\AdminController::class, 'area'])->middleware('role:area,index')->name('area');
Route::get('/admin/areas/add', [App\Http\Controllers\AdminController::class, 'create_area'])->middleware('role:area,add')->name('add-area');
Route::post('/admin/areas/add', [App\Http\Controllers\AdminController::class, 'store_area'])->middleware('role:area,add')->name('add-area');
Route::get('/admin/areas/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy_area'])->middleware('role:area,delete')->name('delete-area');

Route::get('/admin/areas/edit-area/{id}', [App\Http\Controllers\AdminController::class, 'edit_area'])->middleware('role:area,edit')->name('edit-area');
Route::post('/admin/areas/edit-area/{id}', [App\Http\Controllers\AdminController::class, 'update_area'])->middleware('role:area,edit')->name('update-area');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
Route::post('/admin/areas/update_price/{id}', [App\Http\Controllers\AdminController::class, 'update_price_area'])->middleware('role:area,delete')->name('update_price_area');



Route::get('/admin/u_orders', [App\Http\Controllers\AdminController::class, 'user_orders'])->middleware('role:user,index')->name('u_orders');


Route::get('/admin/invoce', [App\Http\Controllers\InvoceController::class, 'index'])->middleware('role:invoce,index')->name('invoce');
Route::get('/admin/invoce/show/{id}', [App\Http\Controllers\InvoceController::class, 'create'])->middleware('role:invoce,add')->name('show_invoce');
Route::get('/admin/invoce/delete/{id}', [App\Http\Controllers\InvoceController::class, 'delete'])->middleware('role:invoce,delete')->name('delete_invoce');

Route::post('/admin/invoce/create', [App\Http\Controllers\InvoceController::class, 'store'])->middleware('role:invoce,add')->name('store_invoce');
Route::post('/admin/invoce/update/{id}', [App\Http\Controllers\InvoceController::class, 'update'])->middleware('role:invoce,edit')->name('update_invoce');
Route::post('/admin/invoce/update_invoce_status/{id}', [App\Http\Controllers\InvoceController::class, 'change_invoce_status'])->middleware('role:invoce,edit')->name('update_invoce_status');


//charge_code
Route::get('/admin/charge_codes/', [App\Http\Controllers\ChargeCodeController::class, 'index'])->middleware('role:chargecode,index')->name('charge_codes');
Route::get('/admin/charge_codes/add', [App\Http\Controllers\ChargeCodeController::class, 'create'])->middleware('role:chargecode,add')->name('add-chargecode');
Route::post('/admin/charge_codes/add', [App\Http\Controllers\ChargeCodeController::class, 'store'])->middleware('role:chargecode,add')->name('add-chargecode');
Route::get('/admin/charge_codes/delete/{id}', [App\Http\Controllers\ChargeCodeController::class, 'destroy'])->middleware('role:chargecode,delete')->name('delete-chargecode');

Route::get('/admin/charge_codes/edit-charge-code/{id}', [App\Http\Controllers\ChargeCodeController::class, 'edit'])->middleware('role:chargecode,edit')->name('edit-chargecode');
Route::post('/admin/charge_codes/edit-charge-code/{id}', [App\Http\Controllers\ChargeCodeController::class, 'update'])->middleware('role:chargecode,edit')->name('update-chargecode');

Route::post('/wallet_charge_by_code', [App\Http\Controllers\WalletController::class, 'charge_by_code'])->middleware('auth')->name('wallet_charge_by_code');

Route::get('/wallet_transaction', [App\Http\Controllers\WalletController::class, 'transaction'])->middleware('auth')->name('transaction');



Route::get('/admin/pages/', [App\Http\Controllers\AdminController::class, 'pages'])->middleware('role:pages,index')->name('pages');
Route::get('/admin/pages/add', [App\Http\Controllers\AdminController::class, 'create_page'])->middleware('role:pages,add')->name('add-page');
Route::post('/admin/pages/add', [App\Http\Controllers\AdminController::class, 'store_page'])->middleware('role:pages,add')->name('add-page');
Route::get('/admin/pages/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy_page'])->middleware('role:pages,delete')->name('delete-page');

Route::get('/admin/pages/edit-page/{id}', [App\Http\Controllers\AdminController::class, 'edit_page'])->middleware('role:pages,edit')->name('edit-page');
Route::post('/admin/pages/edit-page/{id}', [App\Http\Controllers\AdminController::class, 'update_page'])->middleware('role:pages,edit')->name('update-page');

//setting
Route::get('/admin/settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('settings');

Route::post('/admin/setting/edit', [App\Http\Controllers\AdminController::class, 'edit_setting'])->name('edit-setting');

Route::get('/static/{id}', [App\Http\Controllers\HomeController::class, 'get_page'])->name('get_page');




//modules


Route::get('/admin/modules', [App\Http\Controllers\AdminController::class, 'modules'])->middleware('role:module,index')->name('modules');
Route::get('/admin/modules/add', [App\Http\Controllers\AdminController::class, 'create_module'])->middleware('role:module,add')->name('add-module');
Route::post('/admin/modules/add', [App\Http\Controllers\AdminController::class, 'store_module'])->middleware('role:module,add')->name('add-module');
Route::get('/admin/modules/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy_module'])->middleware('role:module,delete')->name('delete-module');

Route::get('/admin/modules/edit-module/{id}', [App\Http\Controllers\AdminController::class, 'edit_module'])->middleware('role:module,edit')->name('edit-module');
Route::post('/admin/modules/edit-module/{id}', [App\Http\Controllers\AdminController::class, 'update_module'])->middleware('role:module,edit')->name('update-module');
Route::get('/create-mail', [App\Http\Controllers\AdminController::class, 'create_email'])->name('create_mail');
Route::post('/send-mail', [App\Http\Controllers\AdminController::class, 'send_mail'])->name('send-mail');
Route::get('/delete_all_files', [App\Http\Controllers\AdminController::class, 'delete_all_files'])->name('delete_all_files');

Route::post('/admin/update_setting', [App\Http\Controllers\AdminController::class, 'update_setting'])->name('update-setting');

Route::get('/create-newsteller', [App\Http\Controllers\AdminController::class, 'create_newsteller'])->name('create_newsteller');
Route::post('/send-newsteller', [App\Http\Controllers\AdminController::class, 'send_newsteller'])->name('send-newsteller');
