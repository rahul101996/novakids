<?php

require_once 'app/RouteController.php';

$route = new RouteController();

$route->group(['', 'LoginController'], function ($route) {
    $route->route('admin', 'index');
    $route->route('logout', 'logout');
});

$route->group(['', 'WebController'], function ($route) {
    $route->route('', 'index');
    $route->route('products/product-details/[:product_name]', 'productDetails');
    $route->route('products/product-details', 'productDetails');

    $route->route('login', 'login');
    $route->route('shop', 'shop');
    $route->route('checkout', 'checkout');
    $route->route('contact', 'ContactUs');
    $route->route('wishlist', 'wishlist');
    $route->route('return-exchange', 'returnExchange');
    $route->route('size-guide', 'sizeGuide');
    $route->route('shipping-info', 'shippingInfo');
    $route->route('faq', 'faq');
    $route->route('terms-and-conditions', 'termsAndConditions');
    $route->route('privacy-policy', 'privacyPolicy');
    $route->route('/api/removeProductFromCollection', 'removeProductFromCollection');
    $route->route('/api/get-product-data', 'getProductData');
    $route->route('/api/get-variant-data', 'getVariantData');
    $route->route('/api/add-to-cart', 'addToCart');
    $route->route('/api/delete-cart', 'deleteCart');
    $route->route('/api/get-cart-data', 'getCartData');
    $route->route('/checkout-cart', 'checkoutCart');
    $route->route('/user-address', 'userAddress');
    $route->route('cookies', 'cookies');
    $route->route('/api/send-otp', 'SendOtp');
    $route->route('category/[:category_name]', 'Category');

    $route->route('api/get-products/[:category_name]', 'getFilteredProducts');


    $route->route('thank-you', 'thankYou');
    $route->route('/razorpay', 'Razorpay');
    $route->route('add-to-wishlist', 'AddToWishlist');

    $route->route('profile', 'MyProfile');
    $route->route('api/search-product', 'searchProduct');
    $route->route("new-arrivals", "NewArrivals");
    $route->route('delete-address', 'DeleteAddress');
    $route->route('edit-address', 'EditAddress');
    $route->route('/order-details/[i:id]', 'OrderDetails');
    $route->route('order-confirm-mail', 'OrderConfirmMail');
    $route->route('/api/popup-display', 'popupDisplay');
    $route->route('/api/free-delivery', 'FreeDelivery');


    $route->route('/addReview', 'addReview');

    // $route->route('/', 'index');
});

$route->group(['', 'CollectionController', 'auth'], function ($route) {
    $route->route('admin/collections', 'index');
    $route->route('admin/add-collections', 'AddCollections');
    $route->route('/edit-collection/[i:id]', 'AddCollections');


    $route->route('/api/collection/status', 'ChangeCollectionStatus');

    // $route->route('/', 'index');

});

$route->group(['', 'PopupController', 'auth'], function ($route) {
    $route->route('admin/add-popup', 'AddPopUp');
    $route->route('admin/popup-list', 'index');
    $route->route('/edit-popup/[i:id]', 'AddPopUp');




    // $route->route('/', 'index');

});

$route->group(['', 'ProductController', 'auth'], function ($route) {
    $route->route('/admin/add-product', 'AddProducts');
    $route->route('/admin/edit-product/[i:id]', 'EditProducts');
    $route->route('/admin/products-list', 'ProductsList');
    $route->route('/admin/inventory', 'Inventory');

    $route->route('/admin/api/update-quantity', 'updateQuantity');


    $route->route('/admin/orders', 'OrderList');
    $route->route('/admin/cancel-orders', 'CancelOrderList');
    $route->route('/admin/get-order-details/[i:order_id]', 'OrderDetails');


    $route->route('/api/new_arrival/status', 'ChangeNewArrivalStatus');

});

$route->group(['', 'CustomerController', 'auth'], function ($route) {
    $route->route('admin/customers-list', 'CustomersList');
    $route->route('admin/customer-info/[i:id]', 'CustomersInfo');


    $route->route('admin/customer-reviews', 'CustomerReviews');
    $route->route('api/customer-reviews/status', 'CustomerReviewsStatus');

    // $route->route('/admin/products-list', 'ProductsList');

});

$route->group(['notify', 'NotificationController', 'auth'], function ($route) {
    $route->route('', 'index');

});

$route->group(['', 'CouponController', 'auth'], function ($route) {
    $route->route('admin/add-coupon', 'AddCoupons');
    $route->route('admin/coupons-list', 'CouponList');
    $route->route('/edit-coupon/[i:id]', 'AddCoupons');
    $route->route('/delete-coupon/[i:id]', 'DeleteCoupon');

    // $route->route('/admin/products-list', 'ProductsList');

});

$route->group(['', 'PaymentGatewayController', 'auth'], function ($route) {
    $route->route('admin/payment-gateway', 'PaymentGateway');
    $route->route('/api/payment-gateway', 'ChangePaymentGateway');


    // $route->route('/admin/products-list', 'ProductsList');

});

$route->group(['', 'CategoryController', 'auth'], function ($route) {

    // $route->route('admin/add-packaging', 'AddCollections');
    $route->route('/admin/add-category', 'index');
    $route->route('/admin/category-list', 'CategoryList');
    $route->route('/edit-category/[i:id]', 'index');
    $route->route('/delete-category/[i:id]', 'DeleteCategory');

    // $route->route('/', 'index');
});

$route->group(['', 'PackageController', 'auth'], function ($route) {

    // $route->route('admin/add-packaging', 'AddCollections');
    $route->route('/admin/add-packaging', 'index');
    $route->route('/admin/packages-list', 'PackageList');
    $route->route('/edit-package/[i:id]', 'index');
    $route->route('/delete-package/[i:id]', 'DeleteCategory');
    $route->route('/admin/free-shipping', 'FreeShipping');

});

$route->group(['', 'DashboardController', 'auth'], function ($route) {
    $route->route('dashboard', 'index');
});

$route->group(['', 'WebsettingController', 'auth'], function ($route) {
    $route->route('/admin/front-cms/home-banner', 'home_banner');
    $route->route('/admin/front-cms/home-banner/add', 'home_banner_add');
    $route->route('/admin/front-cms/home-banner/edit/[i:id]', 'home_banner_add');
    $route->route('/admin/front-cms/home-banner/delete/[i:id]', 'home_banner_delete');


    $route->route('admin/front-cms/nav-heading', 'navbar_heading');
    $route->route('admin/front-cms/nav-heading/add', 'navbar_heading_add');
    $route->route('admin/front-cms/nav-heading/edit/[i:id]', 'navbar_heading_add');
    $route->route('admin/front-cms/nav-heading/delete/[i:id]', 'navbar_heading_delete');


    $route->route('/admin/front-cms/offer-heading', 'offer_heading');
    $route->route('/admin/front-cms/offer-heading/add', 'offer_heading_add');
    $route->route('/admin/front-cms/offer-heading/edit/[i:id]', 'offer_heading_add');
    $route->route('/admin/front-cms/offer-heading/delete/[i:id]', 'offer_heading_delete');

});

$route->group(['master', 'MasterController', 'auth'], function ($route) {
    $route->route('company', 'index');
    $route->route('charges', 'charges');
    $route->route('charges/edit/[i:id]', 'charges');
    $route->route('charges/delete/[i:id]', 'deleteCharges');
    $route->route('expense-type', 'expenseType');
    $route->route('expense-type/edit/[i:id]', 'expenseType');
    $route->route('expense-type/delete/[i:id]', 'deleteExpenseType');
});


return $route->getRoutes();
