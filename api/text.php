<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Api')->name('api.')->group(function () {
    

    
    Route::controller("CurrencyController")->prefix('currency')->group(function () {

        Route::get('crypto/kline/{symbol}/{interval}/{limit}', 'getCurrencyPoint1')->name('crypto/kline');

        Route::get('getCurrencyPoint/{userid}/{symbol?}', 'getCurrencyPoint')->name('getCurrencyPoint');
        Route::get('getCurrencyPointAddedStatus/{userid}/{oid}/{symbol?}', 'getCurrencyPointAddedStatus')->name('getCurrencyPointAddedStatus');
        Route::get('getCurrencyPointAdded/{userid}/{symbol?}', 'getCurrencyPointAdded')->name('getCurrencyPointAdded');
        Route::get('getForexPoint/{userid}/{symbol?}', 'getForexPoint')->name('getForexPoint');
        Route::get('getForexPointAdded/{userid}/{symbol?}', 'getForexPointAdded')->name('getForexPointAdded');

        Route::get('forex/kline/{symbol}/{interval}/{limit}', 'getForexPointAddedOriginal')->name('forex/kline');
        Route::get('getForexPointAddedStatus/{userid}/{oid}/{symbol?}', 'getForexPointAddedStatus')->name('getForexPointAddedStatus');
        

        Route::get('checkopenorder', 'checkopenorder')->name('checkopenorder');
        Route::get('checkopenorderForex', 'checkopenorderForex')->name('checkopenorderForex');

        Route::get('checkcloseOrder', 'checkcloseOrder')->name('checkcloseOrder');
        Route::get('checkcloseOrderForex', 'checkcloseOrderForex')->name('checkcloseOrderForex');
        Route::get('fetchCoinData', 'fetchCoinData')->name('fetchCoinData');

    });

    Route::controller("OrderController")->prefix('order1')->group(function () {
        Route::get('closePosition/{orderid?}','closePosition')->name('closePosition');
    });



    Route::middleware('auth:sanctum')->group(function () {

        Route::post('user-data-submit', 'UserController@userDataSubmit');

        //authorization
        Route::middleware('registration.complete')->controller('AuthorizationController')->group(function () {
            Route::get('authorization', 'authorization');
            Route::get('resend-verify/{type}', 'sendVerifyCode');
            Route::post('verify-email', 'emailVerification');
            Route::post('verify-mobile', 'mobileVerification');
            Route::post('verify-g2fa', 'g2faVerification');
        });

        Route::middleware(['check.status'])->group(function () {

            Route::get('user-info', 'UserController@userInfo');
            
            Route::middleware('registration.complete')->group(function () {

                Route::controller('UserController')->group(function () {

                    Route::get('dashboard', 'dashboard');

                    Route::post('profile-setting', 'submitProfile');
                    Route::post('change-password', 'submitPassword');

                    //KYC
                    Route::get('kyc-form', 'kycForm');
                    Route::post('kyc-submit', 'kycSubmit');

                    //Report
                    Route::any('deposit/history', 'depositHistory');
                    Route::get('transactions', 'transactions');

                    Route::get('referrals', 'referrals');

                    Route::post('add-device-token', 'addDeviceToken');
                    Route::get('push-notifications', 'pushNotifications');
                    Route::post('push-notifications/read/{id}', 'pushNotificationsRead');

                    //2FA
                    Route::get('twofactor', 'show2faForm');
                    Route::post('twofactor/enable', 'create2fa');
                    Route::post('twofactor/disable', 'disable2fa');

                    Route::post('delete-account', 'deleteAccount');

                    Route::post('validate/password', 'validatePassword');
                    Route::get('pair/add/to/favorite/{pairSym}', 'addToFavorite')->name('add.pair.to.favorite');

                    Route::get('notifications', 'notifications');
                });

                Route::controller('OrderController')->group(function () {
                    Route::prefix('order')->group(function () {
                        Route::get('open', 'open');
                        Route::get('completed', 'completed');
                        Route::get('canceled', 'canceled');
                        Route::post('cancel/{id}', 'cancel');
                        Route::post('update/{id}', 'update');
                        Route::get('history', 'history');
                        
                        Route::post('save/{symbol}', 'save')->name('save');
                    });
                    Route::get('trade-history', 'tradeHistory')->name('trade.history');
                });

                //wallet
                Route::controller('WalletController')->name('wallet.')->prefix('wallet')->group(function () {
                    Route::get('list/{type?}', 'list')->name('list');
                    Route::post('transfer', 'transfer')->name('transfer');
                    Route::post('transfer/to/wallet', 'transferToWallet')->name('transfer.to.other.wallet');
                    Route::get('{type}/{currencySymbol}', 'view')->name('view');
                });

                // Withdraw
                Route::controller('WithdrawController')->group(function () {
                    Route::middleware('kyc')->group(function () {
                        Route::get('withdraw-method', 'withdrawMethod');
                        Route::post('withdraw-request', 'withdrawStore');
                        Route::post('withdraw-request/confirm', 'withdrawSubmit');
                    });
                    Route::get('withdraw/history', 'withdrawLog');
                });

                // Payment
                Route::controller('PaymentController')->group(function () {
                    Route::get('deposit/methods', 'methods');
                    Route::post('deposit/insert', 'depositInsert');
                });

                Route::controller('TicketController')->prefix('ticket')->group(function () {
                    Route::get('/', 'supportTicket');
                    Route::post('create', 'storeSupportTicket');
                    Route::get('view/{ticket}', 'viewTicket');
                    Route::post('reply/{id}', 'replyTicket');
                    Route::post('close/{id}', 'closeTicket');
                    Route::get('download/{attachment_id}', 'ticketDownload');
                });
            });
        });

        Route::get('logout', 'Auth\LoginController@logout');
    });
});
