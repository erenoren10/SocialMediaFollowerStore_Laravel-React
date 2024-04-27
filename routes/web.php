<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Home\DiscountCodesController;
use App\Http\Controllers\Home\OrderController;
use App\Http\Controllers\Home\PopupController;
use App\Http\Controllers\sssController;

use App\Http\Controllers\SupportRequestController;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSlideController;
use App\Http\Controllers\Home\AboutContoller;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\HappyCustomerController;
use App\Http\Controllers\Home\DemoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\ProductCategoryController;
use \App\Http\Controllers\Home\BlogController;
use \App\Http\Controllers\Home\ProductController;
use \App\Http\Controllers\Home\UserController;
use \App\Http\Controllers\Home\FakeNotificationController;







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

//Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/abouty', [\App\Http\Controllers\AboutYController::class, 'index'])->name('about');
Route::get('/SSS', [sssController::class, 'index'])->name('sss');
Route::get('/blank', [\App\Http\Controllers\BlankController::class, 'index'])->name('blank');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('/signup', [\App\Http\Controllers\SignupController::class, 'index'])->name('signup');
Route::get('/respassword', [\App\Http\Controllers\PasswordController::class, 'index'])->name('respassword');
Route::get('/services', [\App\Http\Controllers\ServicesController::class, 'showServices'])->name('services');




Route::get('/orderinquiry', [\App\Http\Controllers\OrderİnquiryController::class, 'showOrderInquiry'])->name('orderinquiry');
Route::post('/orderinquiry/result/', [\App\Http\Controllers\OrderİnquiryController::class, 'showOrderInquiryResult'])->name('inquiryresult');
Route::get('/orderinquiry/result/', [\App\Http\Controllers\OrderİnquiryController::class, 'showOrderInquiryResult'])->name('inquiryresult');


Route::get('/mycart', [\App\Http\Controllers\Home\CartController::class, 'ordercheck1'])->name('ordercheck1');
Route::get('/mycart/add/{product}', [\App\Http\Controllers\Home\CartController::class, 'add']);
Route::get('/mycart/remove/{cartDetails}', [\App\Http\Controllers\Home\CartController::class, 'remove']);
Route::get('/cartcheck/product', [\App\Http\Controllers\Home\CartController::class, 'ordercheck2'])->name('ordercheck2');
Route::get('/ordercheck/completion', [\App\Http\Controllers\Home\CartController::class, 'ordercheck3'])->name('ordercheck3');
Route::post('/ordercheck/discount', [\App\Http\Controllers\Home\CartController::class, 'applyDiscount'])->name('apply.discount');
Route::get('/card/paybalance', [\App\Http\Controllers\Home\CartController::class, 'cardbalance'])->name('cardbalance');
Route::get('/card/paycc', [\App\Http\Controllers\Home\CartController::class, 'cardcc'])->name('cardcc');
Route::get('/card/mobile', [\App\Http\Controllers\Home\CartController::class, 'cardmobile'])->name('cardmobile');
Route::get('/card/paytr', [\App\Http\Controllers\Home\CartController::class, 'cardccpaytr'])->name('cardccpaytr');
Route::get('/card/payeft', [\App\Http\Controllers\Home\CartController::class, 'cardeft'])->name('cardeft');
Route::post('/card/payeft/check', [\App\Http\Controllers\Home\CartController::class, 'getOrderInfo'])->name('eftorder');


Route::get('/checkout/success', [\App\Http\Controllers\Home\CheckOutController::class, 'showStatusSuccess'])->name('statussuccess');
Route::get('/checkout/danger', [\App\Http\Controllers\Home\CheckOutController::class, 'showStatusDanger'])->name('statusdanger');
Route::post('/update-platform-username', [\App\Http\Controllers\Home\CartController::class, 'updatePlatformUsername'])->name('update-platform-username');


Route::post('/checkout', [\App\Http\Controllers\Home\CheckOutController::class, 'checkout'])->name('checkout');



Route::get('/get-bank-info/{id}', [BankController::class,'getBankInfo']);

Route::get('/blog', [BlogController::class, 'HomeBlog'])->name('blog');
Route::get('/blog/detay/{id}', [BlogController::class, 'BlogDetails'])->name('blogdetay');
Route::get('/category/blog/{id}', [BlogController::class, 'CategoryBlog'])->name('category.blog');


Route::get('/product/all/{id}', [ProductController::class, 'showAllProduct'])->name('allproduct');
Route::get('/product/one/{id}', [ProductController::class, 'showOneProducts'])->name('oneproduct');
Route::get('/product/twitter', [ProductController::class, 'HomeProduct'])->name('twitterpr');
Route::get('/product/instagram', [ProductController::class, 'showProductInstagram'])->name('instagrampr');
Route::get('/product/tiktok', [ProductController::class, 'showProducttiktok'])->name('tiktokpr');
Route::get('/product/youtube', [ProductController::class, 'showProductyoutube'])->name('youtubepr');
Route::get('/product/twitch', [ProductController::class, 'showProducttwitch'])->name('twitchpr');
Route::get('/product/facebook', [ProductController::class, 'showProductfacebook'])->name('facebookpr');
Route::get('/product/spotify', [ProductController::class, 'showProductSpotify'])->name('spotifypr');



Route::get('/get-subcategories/{categoryId}', [ProductController::class, 'getSubCategories']);
Route::get('/get-subcategoriesalt/{categoryId}', [ProductController::class, 'getSubCategoriesAlt']);
Route::get('/get-subproduct/{categoryId}', [ProductController::class, 'getSubProduct']);
Route::post('/send-sub-product', [ProductController::class,'receiveSubProduct']);

Route::get('/get-subcategoriesindex/{categoryId}', [DemoController::class, 'getSubCategories']);
Route::get('/get-packages/{categoryId2}', [DemoController::class, 'getPackages']);
Route::get('/get-packagesprice/{categoryId3}', [DemoController::class, 'getPrices']);





Route::get('/contact', [ContactController::class, 'ContactMe'])->name('contact.me');
Route::post('/store/message', [ContactController::class, 'StoreMessage'])->name('store.message');





Route::controller(DemoController::class)->group(function () {
    Route::get('/', 'Home')->name('home');
    Route::get('/', 'NotFound')->name('not.found');

});


//Admin Controller Route
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.profile');
    });


    Route::controller(FavoriteController::class)->group(function () {
        Route::post('/addfavorite', 'addFavorite')->name('add.favorite');
        Route::get('/deletefavorite/{id}', 'deleteFavorite')->name('delete.favorite');
    });

    Route::get('/profil', [ProfileController::class, 'showProfile'])->name('profil');
    Route::get('/profil/orders', [ProfileController::class, 'showOrders'])->name('orders');
    Route::get('/profil/customer', [ProfileController::class, 'showCustomerPanel'])->name('customerp');
    Route::get('/profil/affiliate', [ProfileController::class, 'showAffiliateMarketing'])->name('affiliate');
    Route::get('/profil/favorite', [ProfileController::class, 'showMyFavorite'])->name('favorite');
    Route::get('/profil/balance', [ProfileController::class, 'showBalance'])->name('balance');
    Route::get('/profil/codes', [ProfileController::class, 'showCodes'])->name('codes');
    Route::post('/profil/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/upload-profile-photo', [ProfileController::class, 'uploadProfilePhoto'])->name('upload.profile.photo');

    Route::get('/profil/support', [SupportRequestController::class, 'showSupportRequest'])->name('support');
    Route::get('/profil/supportdetails/{id}', [SupportRequestController::class, 'showSupportRequestDetails'])->name('supportdetails');
    Route::post('/profil/support/', [SupportRequestController::class, 'addSupportRequest'])->name('add.support');
    Route::post('/profil/supportdetails/{id}', [SupportRequestController::class, 'sendSupportRequestMessage'])->name('send.message');


    Route::get('/balance', 'BalanceController@showBalance')->name('balance.show');
});

//Home Slide Controller Route
Route::middleware(['check.admin.access'])->group(function () {
    Route::controller(HomeSlideController::class)->group(function () {
        Route::get('/home/slide', 'HomeSlide')->name('home.slide');
        Route::post('/upload/slide', 'UploadSlide')->name('upload.slide');
    });

    Route::controller(SupportRequestController::class)->group(function () {
        Route::get('/all/support', 'allSupportRequest')->name('all.support');
        Route::get('/answer/support/{id}', 'answerSupportRequest')->name('answer.support');
        Route::post('/all/support/{id}', 'sendAnswerSupportRequest')->name('sendAnswer.support');
        Route::get('/delete/support/{id}', 'deleteSupportRequest')->name('delete.support');

    });

    //User Controller
    Route::controller(UserController::class)->group(function () {
        Route::get('/all/user', 'AllUser')->name('all.user');

        Route::get('/edit/user/{id}', 'EditUser')->name('edit.user');
        Route::post('/update/user', 'UpdateUser')->name('update.user');
        Route::get('/delete/user', 'DeleteUser')->name('delete.user');

    });

    Route::controller(FakeNotificationController::class)->group(function () {
        Route::get('/all/fakenotification', 'AllFakeNotification')->name('all.fakenotification');

        Route::get('/add/fakenotification', 'AddFakeNotification')->name('add.fakenotification');
        Route::post('/store/fakenotification', 'StoreFakeNotification')->name('store.fakenotification');

        Route::get('/edit/fakenotification/{id}', 'EditFakeNotification')->name('edit.fakenotification');
        Route::post('/update/fakenotification', 'UpdateFakeNotification')->name('update.fakenotification');

        Route::get('/delete/fakenotification/{id}', 'DeleteFakeNotification')->name('delete.fakenotification');
        Route::get('/fakenotification/details/{id}', 'FakeNotificationDetails')->name('fakenotification.details');
    });

    Route::controller(DiscountCodesController::class)->group(function () {
        Route::get('/all/discountcodes', 'AllDiscountCodes')->name('all.discountcodes');

        Route::get('/add/discountcodes', 'AddDiscountCodes')->name('add.discountcodes');
        Route::post('/store/discountcodes', 'StoreDiscountCodes')->name('store.discountcodes');

        Route::get('/edit/discountcodes/{id}', 'EditDiscountCodes')->name('edit.discountcodes');
        Route::post('/update/discountcodes', 'UpdateDiscountCodes')->name('update.discountcodes');

        Route::get('/delete/discountcodes/{id}', 'DeleteDiscountCodes')->name('delete.discountcodes');
        Route::get('/discountcodes/details/{id}', 'DiscountCodesDetails')->name('discountcodes.details');
    });

    Route::controller(PopupController::class)->group(function () {
        Route::get('/all/popupnotification', 'AllPopupNotification')->name('all.popupnotification');

        Route::get('/add/popupnotification', 'AddPopupNotification')->name('add.popupnotification');
        Route::post('/store/popupnotification', 'StorePopupNotification')->name('store.popupnotification');

        Route::get('/edit/popupnotification/{id}', 'EditPopupNotification')->name('edit.popupnotification');
        Route::post('/update/popupnotification', 'UpdatePopupNotification')->name('update.popupnotification');

        Route::get('/delete/popupnotification/{id}', 'DeletePopupNotification')->name('delete.popupnotification');
        Route::get('/popupnotification/details/{id}', 'PopupNotificationDetails')->name('popupnotification.details');
    });

    Route::controller(sssController::class)->group(function () {
        Route::get('/all/sorular', 'Allsss')->name('all.sss');

        Route::get('/add/sorular', 'Addsss')->name('add.sss');
        Route::post('/store/sorular', 'Storesss')->name('store.sss');

        Route::get('/edit/sorular/{id}', 'Editsss')->name('edit.sss');
        Route::post('/update/sorular', 'Updatesss')->name('update.sss');

        Route::get('/delete/sorular/{id}', 'Deletesss')->name('delete.sss');
        Route::get('/sorular/details/{id}', 'sssDetails')->name('sss.details');
    });

    Route::controller(HappyCustomerController::class)->group(function () {
        Route::get('/all/happycustomer', 'Allhappycustomer')->name('all.happycustomer');

        Route::get('/add/happycustomer', 'Addhappycustomer')->name('add.happycustomer');
        Route::post('/store/happycustomer', 'Storehappycustomer')->name('store.happycustomer');

        Route::get('/edit/happycustomer/{id}', 'EditHappyCustomer')->name('edit.happycustomer');
        Route::post('/update/happycustomer', 'UpdateHappyCustomer')->name('update.happycustomer');

        Route::get('/delete/happycustomer/{id}', 'DeleteHappyCustomer')->name('delete.happycustomer');
        Route::get('/happycustomer/details/{id}', 'HappyCustomerDetails')->name('happycustomer.details');
    });

    Route::controller(BankController::class)->group(function () {
        Route::get('/all/bank', 'AllBank')->name('all.bank');

        Route::get('/add/bank', 'AddBank')->name('add.bank');
        Route::post('/store/bank', 'StoreBank')->name('store.bank');

        Route::get('/edit/bank/{id}', 'EditBank')->name('edit.bank');
        Route::post('/update/bank', 'UpdateBank')->name('update.bank');

        Route::get('/delete/bank/{id}', 'DeleteBank')->name('delete.bank');
        Route::get('/bank/details/{id}', 'BankDetails')->name('bank.details');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/all/order', 'AllOrder')->name('all.order');

        Route::get('/add/order', 'AddOrder')->name('add.order');
        Route::post('/store/order', 'StoreOrder')->name('store.order');

        Route::get('/edit/order/{id}', 'EditOrder')->name('edit.order');
        Route::post('/update/order', 'UpdateOrder')->name('update.order');

        Route::get('/delete/order/{id}', 'DeleteOrder')->name('delete.order');
        Route::get('/order/details/{id}', 'OrderDetails')->name('order.details');
    });


    //About Page Controller Route

    Route::controller(AboutContoller::class)->group(function () {
        Route::get('/about/page', 'AboutPage')->name('about.page');
        Route::post('/upload/about', 'UploadAbout')->name('upload.about');
        Route::get('/about', 'HomeAbout')->name('home.about');
        Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
        Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');

        Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
        Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');

        Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
        Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');


    });



    //Home Slide Controller Route
    Route::controller(PortfolioController::class)->group(function () {
        Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
        Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
        Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');

        Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
        Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
        Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');

        Route::get('/details/portfolio/{id}', 'DetailsPortfolio')->name('details.portfolio');
        Route::get('/portfolio', 'IndexPortfolio')->name('index.portfolio');
    });


    //BlogCategoryController  Route
    Route::controller(BlogCategoryController::class)->group(function () {
        Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
        Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');

        Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');

        Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
        Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');

        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
    });


    Route::controller(BlogController::class)->group(function () {
        Route::get('/all/blog', 'AllBlog')->name('all.blog');

        Route::get('/add/blog', 'AddBlog')->name('add.blog');
        Route::post('/store/blog', 'StoreBlog')->name('store.blog');

        Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
        Route::post('/update/blog', 'UpdateBlog')->name('update.blog');

        Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');
        Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    });



    Route::controller(FooterController::class)->group(function () {
        Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
        Route::post('/update/footer', 'UpdateFooter')->name('update.footer');

    });


    Route::controller(ContactController::class)->group(function () {

        Route::get('/contact/message', 'ContactMessage')->name('contact.message');
        Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');


    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/all/product', 'AllProduct')->name('all.product');
        Route::get('/add/product', 'AddProduct')->name('add.product');

        Route::post('/store/product', 'StoreProduct')->name('store.product');
        Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');

        Route::post('/update/product', 'UpdateProduct')->name('update.product');
        Route::get('/product/details/{id}', 'ProductDetails')->name('product.details');
    });




    Route::controller(ProductCategoryController::class)->group(function () {
        Route::get('/all/product/category', 'AllProductCategory')->name('all.product.category');
        Route::get('/add/product/category', 'AddProductCategory')->name('add.product.category');

        Route::post('/store/product/category', 'StoreProductCategory')->name('store.product.category');

        Route::get('/edit/product/category/{id}', 'EditProductCategory')->name('edit.product.category');
        Route::post('/update/product/category/{id}', 'UpdateProductCategory')->name('update.product.category');

        Route::get('/delete/product/category/{id}', 'DeleteProductCategory')->name('delete.product.category');


    });
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['check.admin.access'])->name('dashboard');

require __DIR__ . '/auth.php';