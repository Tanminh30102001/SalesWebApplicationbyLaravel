<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AdminAddCategoriesComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckOutComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoriesComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminOrder;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserOrderDetailsomponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\WishlistComponent;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/',HomeComponent::class)->name('home.index');
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/cart',CartComponent::class)->name('shop.cart');
Route::get('/checkout',CheckOutComponent::class)->name('shop.checkout');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashboard','App\Http\Livewire\User\UserDashboardComponent@render')->name('user.dashboard');
    Route::get('/user/dashboard/edit/{user_id}',UserEditProfileComponent::class)->name('user.dashboard.edit');
   Route::get('/user/orders',UserOrderComponent::class)->name('user.order');
   Route::get('/user/orders/{order_id}',UserOrderDetailsomponent::class)->name('user.orderdetails');
   Route::get('/user/review/{order_details_id}',UserReviewComponent::class)->name('user.review');
    

});

Route::middleware(['auth','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/add/categories',AdminAddCategoriesComponent::class)->name('admin.add.categories');
    Route::get('/admin/edit/categories/{category_id}',AdminEditCategoriesComponent::class)->name('admin.edit.category');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.product');
    Route::get('/admin/add/product',AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('/admin/edit/product/{product_id}',AdminEditProductComponent::class)->name('admin.product.edit');
    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.home.slider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.home.slider.add');
    Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.home.slider.edit');
    Route::get('/admin/order',AdminOrder::class)->name('admin.order');
    Route::get('/admin/orderdetails/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetails');
});
Route::get('/product-category/{slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/wishlist',WishlistComponent::class)->name('shop.wishlist');
Route::get('thankyou',ThankyouComponent::class)->name('thankyou');

Route::get('/product/{slug}',DetailsComponent::class)->name("product.details");
require __DIR__.'/auth.php';
