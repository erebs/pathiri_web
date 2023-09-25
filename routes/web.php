<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\FranchiseStaffController;
use App\Http\Controllers\FranchiseShopController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopRestaurentController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AddOnController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;


Route::get('/administrator', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin_login', [AdminController::class, 'admin_login']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/gallery', [HomeController::class, 'gallery']);
Route::get('/menu', [HomeController::class, 'menu']);
Route::get('/menus/{type}', [HomeController::class, 'menu_type']);

Route::post('/book-table', [HomeController::class, 'book_table']);

Route::get('/restaurents', [HomeController::class, 'index1']);
Route::get('/restaurents/about', [HomeController::class, 'about1']);
Route::get('/restaurents/contact', [HomeController::class, 'contact1']);
Route::get('/restaurents/gallery', [HomeController::class, 'gallery1']);
Route::get('/restaurents/menu', [HomeController::class, 'menu1']);
Route::get('/restaurents/menus/{type}', [HomeController::class, 'menu_type1']);

Route::middleware(['AdminLoginCheck','PreventBack'])->group(function () {


Route::get('/administrator/dashboard' , [AdminController::class, 'dashboard']);
Route::get('/administrator/logout' , [AdminController::class, 'logout']);
Route::get('/administrator/change-password', [AdminController::class, 'change_password']);
Route::post('/administrator/password-update', [AdminController::class, 'password_update']);
Route::get('/administrator/edit-profile', [AdminController::class, 'edit_admin_profile']);
Route::post('/administrator/profile-update', [AdminController::class, 'admin_profile_update']);

Route::get('/administrator/add-franchise', [AdminController::class, 'add_franchise']);
Route::post('/administrator/franchise-add', [AdminController::class, 'franchise_add']);
Route::get('/administrator/edit-franchise/{fid}', [AdminController::class, 'edit_franchise']);
Route::post('/administrator/franchise-edit', [AdminController::class, 'franchise_edit']);
Route::post('/administrator/franchise-psw-update', [AdminController::class, 'franchise_psw_update']);
Route::post('/administrator/block-franchise', [AdminController::class, 'block_franchise']);
Route::post('/administrator/activate-franchise', [AdminController::class, 'activate_franchise']);

Route::get('/administrator/active-franchise', [AdminController::class, 'active_franchise']);
Route::get('/administrator/blocked-franchise', [AdminController::class, 'blocked_franchise']);
Route::get('/administrator/view-franchise/{fid}', [AdminController::class, 'view_franchise']);
Route::get('/administrator/active-franchise', [AdminController::class, 'active_franchise']);

Route::get('/administrator/restaurent-categories', [AdminCategoryController::class, 'restaurent_categories']);
Route::get('/administrator/add-rcategory', [AdminCategoryController::class, 'add_rcategory']);
Route::post('/administrator/rcategory-add', [AdminCategoryController::class, 'rcategory_add']);
Route::get('/administrator/edit-rcategory/{cid}' , [AdminCategoryController::class, 'edit_rcategory']);
Route::post('/administrator/rcategory-edit' , [AdminCategoryController::class, 'rcategory_edit']);
Route::post('/administrator/block-rcategory' , [AdminCategoryController::class, 'block_rcategory']);
Route::post('/administrator/activate-rcategory' , [AdminCategoryController::class, 'activate_rcategory']);

Route::get('/administrator/grocery-categories', [AdminCategoryController::class, 'grocery_categories']);
Route::get('/administrator/add-gcategory', [AdminCategoryController::class, 'add_gcategory']);
Route::post('/administrator/gcategory-add', [AdminCategoryController::class, 'gcategory_add']);
Route::get('/administrator/edit-gcategory/{cid}' , [AdminCategoryController::class, 'edit_gcategory']);
Route::post('/administrator/gcategory-edit' , [AdminCategoryController::class, 'gcategory_edit']);
Route::post('/administrator/block-gcategory' , [AdminCategoryController::class, 'block_gcategory']);
Route::post('/administrator/activate-gcategory' , [AdminCategoryController::class, 'activate_gcategory']);


    
});


Route::get('/franchise', [FranchiseController::class, 'login'])->name('franchise.login');
Route::post('/franchise_login', [FranchiseController::class, 'franchise_login']);

Route::middleware(['FranchiseLoginCheck','PreventBack'])->group(function () {

Route::get('/franchise/dashboard' , [FranchiseController::class, 'dashboard']);
Route::get('/franchise/logout' , [FranchiseController::class, 'logout']);
Route::get('/franchise/change-password', [FranchiseController::class, 'change_password']);
Route::post('/franchise/password-update', [FranchiseController::class, 'password_update']);
Route::get('/franchise/edit-profile', [FranchiseController::class, 'edit_franchise_profile']);
Route::post('/franchise/profile-update', [FranchiseController::class, 'franchise_profile_update']);

Route::get('/franchise/add-staff' , [FranchiseStaffController::class, 'add_staff']);
Route::post('/franchise/staff-add' , [FranchiseStaffController::class, 'staff_add']);
Route::get('/franchise/active-staff', [FranchiseStaffController::class, 'active_staff']);
Route::get('/franchise/edit-staff/{fid}', [FranchiseStaffController::class, 'edit_staff']);
Route::post('/franchise/staff-edit', [FranchiseStaffController::class, 'staff_edit']);
Route::post('/franchise/staff-psw-update', [FranchiseStaffController::class, 'staff_psw_update']);
Route::post('/franchise/block-staff', [FranchiseStaffController::class, 'block_staff']);
Route::post('/franchise/activate-staff', [FranchiseStaffController::class, 'activate_staff']);
Route::get('/franchise/blocked-staff', [FranchiseStaffController::class, 'blocked_staff']);

Route::get('/franchise/active-shops' , [FranchiseShopController::class, 'active_shops']);
Route::get('/franchise/add-shop' , [FranchiseShopController::class, 'add_shop']);
Route::get('/franchise/edit-shop/{sid}' , [FranchiseShopController::class, 'edit_shop']);
Route::post('/franchise/shop-add' , [FranchiseShopController::class, 'shop_add']);
Route::post('/franchise/shop-edit' , [FranchiseShopController::class, 'shop_edit']);
Route::post('/franchise/shop-psw-update', [FranchiseShopController::class, 'shop_psw_update']);
Route::post('/franchise/block-shop', [FranchiseShopController::class, 'block_shop']);
Route::post('/franchise/activate-shop', [FranchiseShopController::class, 'activate_shop']);
Route::get('/franchise/blocked-shops', [FranchiseShopController::class, 'blocked_shops']);
Route::get('/franchise/view-shop/{sid}', [FranchiseShopController::class, 'view_shop']);

});


Route::get('/restaurent-login', [ShopController::class, 'login'])->name('shop.login');
Route::post('/shop_login', [ShopController::class, 'shop_login']);

Route::middleware(['ShopLoginCheck','PreventBack'])->group(function () {

Route::get('/restaurent/dashboard' , [ShopController::class, 'dashboard']);
Route::get('/restaurent/logout' , [ShopController::class, 'logout']);
Route::get('/restaurent/change-password', [ShopController::class, 'change_password']);
Route::post('/restaurent/password-update', [ShopController::class, 'password_update']);
Route::get('/restaurent/edit-profile', [ShopController::class, 'edit_shop_profile']);
Route::post('/restaurent/profile-update', [ShopController::class, 'shop_profile_update']);

Route::get('/restaurent/shop-availability', [ShopController::class, 'shop_availability']);
Route::post('/restaurent/availability-update', [ShopController::class, 'availability_update']);

Route::get('/restaurent/add-category' , [ShopRestaurentController::class, 'add_category']);
Route::post('/restaurent/category-add' , [ShopRestaurentController::class, 'category_add']);
Route::get('/restaurent/active-categories' , [ShopRestaurentController::class, 'active_categories']);
Route::get('/restaurent/blocked-categories' , [ShopRestaurentController::class, 'blocked_categories']);
Route::get('/restaurent/edit-category/{cid}' , [ShopRestaurentController::class, 'edit_category']);
Route::post('/restaurent/category-edit' , [ShopRestaurentController::class, 'category_edit']);
Route::post('/restaurent/block-category' , [ShopRestaurentController::class, 'block_category']);
Route::post('/restaurent/activate-category' , [ShopRestaurentController::class, 'activate_category']);

Route::get('/restaurent/add-item' , [ShopRestaurentController::class, 'add_item']);
Route::post('/restaurent/item-add' , [ShopRestaurentController::class, 'item_add']);
Route::get('/restaurent/active-items' , [ShopRestaurentController::class, 'active_items']);
Route::get('/restaurent/blocked-items' , [ShopRestaurentController::class, 'blocked_items']);
Route::get('/restaurent/edit-item/{cid}' , [ShopRestaurentController::class, 'edit_item']);
Route::post('/restaurent/item-edit' , [ShopRestaurentController::class, 'item_edit']);
Route::post('/restaurent/block-item' , [ShopRestaurentController::class, 'block_item']);
Route::post('/restaurent/activate-item' , [ShopRestaurentController::class, 'activate_item']);
Route::get('/restaurent/view-item/{cid}' , [ShopRestaurentController::class, 'view_item']);

Route::get('/restaurent/edit-price/{cid}' , [ShopRestaurentController::class, 'edit_price']);
Route::post('/restaurent/price-edit' , [ShopRestaurentController::class, 'price_edit']);

Route::get('/restaurent/add-variant/{cid}' , [ShopRestaurentController::class, 'add_variant']);
Route::post('/restaurent/variant-add' , [ShopRestaurentController::class, 'variant_add']);

Route::get('/restaurent/edit-variant/{vid}' , [ShopRestaurentController::class, 'edit_variant']);
Route::post('/restaurent/variant-edit' , [ShopRestaurentController::class, 'variant_edit']);

Route::post('/restaurent/get-items' , [ShopRestaurentController::class, 'get_items']);
Route::post('/restaurent/add-relateditem' , [ShopRestaurentController::class, 'add_relateditems']);
Route::post('/restaurent/get-itemslist' , [ShopRestaurentController::class, 'get_itemslist']);
Route::post('/restaurent/delete-itemslist' , [ShopRestaurentController::class, 'delete_itemslist']);


Route::get('/restaurent/banners' , [AddOnController::class, 'banners']);
Route::post('/restaurent/add-banner' , [AddOnController::class, 'add_banner']);
Route::get('/restaurent/edit-banner/{bid}' , [AddOnController::class, 'edit_banner']);
Route::post('/restaurent/banner-edit' , [AddOnController::class, 'banner_edit']);
Route::post('/restaurent/delete-banner' , [AddOnController::class, 'delete_banner']);

Route::get('/restaurent/offers' , [AddOnController::class, 'offers']);
Route::post('/restaurent/add-offer' , [AddOnController::class, 'add_offer']);
Route::get('/restaurent/edit-offer/{bid}' , [AddOnController::class, 'edit_offer']);
Route::post('/restaurent/offer-edit' , [AddOnController::class, 'offer_edit']);
Route::post('/restaurent/delete-offer' , [AddOnController::class, 'delete_offer']);

Route::get('/restaurent/gallery' , [AddOnController::class, 'gallery']);
Route::post('/restaurent/add-gallery' , [AddOnController::class, 'add_gallery']);
Route::post('/restaurent/delete-gallery' , [AddOnController::class, 'delete_gallery']);

Route::get('/restaurent/videos' , [AddOnController::class, 'videos']);
Route::post('/restaurent/add-video' , [AddOnController::class, 'add_video']);
Route::get('/restaurent/edit-video/{bid}' , [AddOnController::class, 'edit_video']);
Route::post('/restaurent/video-edit' , [AddOnController::class, 'video_edit']);
Route::post('/restaurent/delete-video' , [AddOnController::class, 'delete_video']);

Route::get('/restaurent/testimonials' , [AddOnController::class, 'testimonials']);
Route::post('/restaurent/add-testimonial' , [AddOnController::class, 'add_testimonial']);
Route::get('/restaurent/edit-testimonial/{tid}' , [AddOnController::class, 'edit_testimonial']);
Route::post('/restaurent/testimonial-edit' , [AddOnController::class, 'testimonial_edit']);
Route::post('/restaurent/delete-testimonial' , [AddOnController::class, 'delete_testimonial']);

Route::get('/restaurent/tables' , [BookingController::class, 'tables']);
Route::post('/restaurent/add-table' , [BookingController::class, 'add_table']);
Route::post('/restaurent/delete-table' , [BookingController::class, 'delete_table']);
Route::get('/restaurent/edit-table/{tid}' , [BookingController::class, 'edit_table']);
Route::post('/restaurent/table-edit' , [BookingController::class, 'table_edit']);

Route::get('/restaurent/edit-booking/{bid}' , [BookingController::class, 'edit_booking']);
Route::post('/restaurent/booking-edit' , [BookingController::class, 'booking_edit']);

Route::get('/restaurent/booking-history' , [BookingController::class, 'booking_history']);
Route::post('/restaurent/get-bookings' , [BookingController::class, 'get_bookings']);

});
