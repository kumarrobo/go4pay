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


Route::get('/', 'Auth\User\LoginController@showHomePage')->name('home');



Route::prefix('admin')->namespace('Auth\Admin')->group(function(){

Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('admin.logout');

//Reset Password
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
//Route::post('password/reset', 'ResetPasswordController@reset')->name('admin.password.update');


Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('admin.verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
});


Route::prefix('admin')->namespace('Admin')->group(function(){
	Route::get('dashboard', 'DashboardController@index');
});




/***********************RO Route Start Here*********************************************/


Route::prefix('RO')->namespace('Auth\Ro')->group(function(){
Route::get('login', 'LoginController@showLoginForm')->name('ro.login');
Route::get('verifyOTP/{id}/{password}', 'LoginController@showOTPLoginForm')->name('ro.verifyOTP');
Route::post('loginverifyotp', 'LoginController@verifyOTPAndLogin')->name('ro.loginverifyotp');

Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('ro.logout');

//Reset Password
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('ro.password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('ro.password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('ro.password.reset');
//Route::post('password/reset', 'ResetPasswordController@reset')->name('ro.password.update');


Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('ro.password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

Route::get('email/verify', 'Auth\VerificationController@show')->name('ro.verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('ro.verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('ro.verification.resend');
});


Route::prefix('RO')->namespace('RO')->group(function(){
	Route::get('dashboard', 'DashboardController@index')->name('rodashboard');


	Route::any('balancerequest', 		'WalletController@newBalanceRequest')->name('robalancerequest');
	// Route::any('allbalancerequest', 	'WalletController@allbalancerequest')->name('roallbalancerequest');
	Route::any('pushbalance', 			'WalletController@pushBalanceRequest')->name('ropushbalance');
	Route::any('pushbalancenow/{id}/{tday}', 'WalletController@TransferBalanceToUser')->name('ropushbalancenow');
	Route::any('transfertouserwallet/{id}/{tday}','WalletController@TransferBalanceToUserWallet')->name('rotransfertouserwallet');
	Route::any('verifytransfer/{id}/{tday}','WalletController@verifyOTPForBalanceTransfer')->name('roverifytransfer');
	Route::any('verifyotp','SMSController@isValidOTP')->name('roverifyotp');
	Route::any('txncreditsuccess/{id}/{lastid}','WalletController@balanceTransferSuccessfully')->name('rotxncreditsuccess');


	Route::any('tatrechargeesybuz/{id}','WalletController@tatkalWalletRechargeEaseBuzz')->name('rotatrechargeesybuz');
	Route::any('tatrechargeesybuz','WalletController@tatkalWalletRechargeEaseBuzz')->name('rotatrechargeesybuz');
	Route::any('confirmrecharge','WalletController@confirmRechargeTatkalWalletRechargeEaseBuzz')->name('roconfirmrecharge');
	Route::post('confirmationorder','WalletController@confirmationOrderPage')->name('roconfirmationorder');
	Route::any('rechargesuccess','WalletController@walletRechargeSuccess')->name('rorechargesuccess');
	Route::any('rechargefailed','WalletController@walletRechargeFailed')->name('rorechargefailed');
	Route::any('walletcredited/{id}','WalletController@walletCredited')->name('rowalletcredited');
	
	//Report
	Route::any('myreport'				,	'ReportController@myReport')->name('myreport');
	Route::any('rorechargesreport'		,	'ReportController@walletRechargeReport')->name('rorechargesreport');

	Route::any('writeus'				,	'GeneralController@writeus')->name('writeus');
	Route::any('help'					,	'GeneralController@help')->name('help');
	Route::any('addbankaccount'			,	'GeneralController@help')->name('addbankaccount');
	
	// //Money Transfer To Bank from Wallet
	Route::any('moneytransfer'			,	'MoneyTransferController@moneyTransfer')->name('romoneytransfer');
	Route::any('bankaccountlist/{mdstr}',	'MoneyTransferController@bankAccountList')->name('robankaccountlist');
	Route::any('addaccount/{id}'		,	'MoneyTransferController@addAccountNumber')->name('roaddaccount');
	Route::any('addaccountrequest'		,	'MoneyTransferController@addAccountRequest')->name('roaddaccountrequest');
	Route::any('verifybankaccount'		,	'MoneyTransferController@isValidAccountNumber')->name('roverifybankaccount');
	Route::any('deleteaccount/{id}'		,	'MoneyTransferController@deleteBankAccount')->name('rodeleteaccount');
	Route::any('paymentinitiate'		,	'MoneyTransferController@paymentinitiate')->name('ropaymentinitiate');

	//Send Money To Bank Account, Param is Verified Mobile Id
	Route::any('transfermoney/{id}'		,	'MoneyTransferController@transferMoney')->name('rotransfermoney');
	Route::any('transferaction'			,	'MoneyTransferController@transferMoneyAPIAction')->name('rotransferaction');
});


/***********************RO Route Ends Here*********************************************/


Route::prefix('user')->namespace('User')->group(function(){
	Route::get('dashboard', 			'DashboardController@index')->name('dashboard');
	
	Route::get('addretailer', 			'DashboardController@addretailer')->name('addretailer');
	Route::any('allretailerlist', 		'DashboardController@allROList')->name('allretailerlist');
	Route::post('addretailer', 			'DashboardController@postAddRetailer')->name('addretailer');
	Route::any('retaileraddress/{id}', 	'DashboardController@retaileraddress')->name('retaileraddress');
	Route::any('retailercompany/{id}', 	'DashboardController@retailerCompanyProof')->name('retailercompany');
	Route::any('roprofile/{id}', 		'DashboardController@retailerProfile')->name('roprofile');
	Route::any('rocompanyprofile/{id}', 'DashboardController@ROCompanyProfile')->name('rocompanyprofile');
	Route::any('updateretailer'		, 'DashboardController@UpdateROProfile')->name('updateretailer');
	
	Route::any('personaldetails/{id}',	'DashboardController@retailerPersonalDetails')->name('personaldetails');
	Route::any('documentproof/{id}', 	'DashboardController@retailerDocumentProof')->name('documentproof');
	Route::any('viewrodetails/{id}', 	'DashboardController@viewrodetails')->name('viewrodetails');

	//Report
	Route::any('dsmyreport'				,	'ReportController@myReport')->name('dsmyreport');
	Route::any('dsrechargesreport'		,	'ReportController@walletRechargeReport')->name('dsrechargesreport');
	Route::any('commission'				,	'DashboardController@commingSoon')->name('commission');
	Route::any('transactionstatus'		,	'DashboardController@commingSoon')->name('transactionstatus');
	
	//Generate Balance Request By Distributor
	Route::any('balancerequest', 		'WalletController@newBalanceRequest')->name('balancerequest');
	Route::any('allbalancerequest', 	'WalletController@allbalancerequest')->name('allbalancerequest');
	Route::any('pushbalance', 			'WalletController@pushBalanceRequest')->name('pushbalance');
	Route::any('pushbalancenow/{id}/{tday}', 'WalletController@TransferBalanceToUser')->name('pushbalancenow');
	Route::any('transfertouserwallet/{id}/{tday}','WalletController@TransferBalanceToUserWallet')->name('transfertouserwallet');
	Route::any('verifytransfer/{id}/{tday}','WalletController@verifyOTPForBalanceTransfer')->name('verifytransfer');
	Route::any('verifyotp','SMSController@isValidOTP')->name('verifyotp');
	Route::any('txncreditsuccess/{id}/{lastid}','WalletController@balanceTransferSuccessfully')->name('txncreditsuccess');
	Route::any('tatrechargeesybuz/{id}','WalletController@tatkalWalletRechargeEaseBuzz')->name('tatrechargeesybuz');
	Route::any('tatrechargeesybuz','WalletController@tatkalWalletRechargeEaseBuzz')->name('tatrechargeesybuz');
	Route::any('confirmrecharge','WalletController@confirmRechargeTatkalWalletRechargeEaseBuzz')->name('confirmrecharge');
	Route::post('confirmationorder','WalletController@confirmationOrderPage')->name('confirmationorder');
	Route::any('rechargesuccess','WalletController@walletRechargeSuccess')->name('rechargesuccess');
	Route::any('rechargefailed','WalletController@walletRechargeFailed')->name('rechargefailed');
	Route::any('walletcredited/{id}','WalletController@walletCredited')->name('walletcredited');
	
	//Money Transfer To Bank from Wallet
	Route::any('moneytransfer'			,	'MoneyTransferController@moneyTransfer')->name('moneytransfer');
	Route::any('bankaccountlist/{mdstr}',	'MoneyTransferController@bankAccountList')->name('bankaccountlist');
	Route::any('addaccount/{id}'		,	'MoneyTransferController@addAccountNumber')->name('addaccount');
	Route::any('addaccountrequest'		,	'MoneyTransferController@addAccountRequest')->name('addaccountrequest');
	Route::any('editusercommission/{id}'			,	'DashboardController@editUserCommission')->name('editusercommission');
	Route::any('viewrotransaction/{id}'	,	'DashboardController@viewUserTransactionList')->name('viewrotransaction');
	
});



Route::any('rechargesuccess','User\WalletController@walletRechargeSuccess')->name('rechargesuccess');
Route::any('rechargefailed','User\WalletController@walletRechargeFailed')->name('rechargefailed');
Route::any('walletcredited/{id}','User\WalletController@walletCredited')->name('walletcredited');


Route::get('verifyOTP/{id}/{password}', 'Auth\User\LoginController@showOTPLoginForm')->name('verifyOTP');
Route::post('verifyotp', 				'Auth\User\LoginController@verifyOTPAndLogin')->name('user.verifyotp');

Route::get('register', 					'Auth\User\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 				'Auth\User\RegisterController@register')->name('register');
Route::any('addressreqired/{id}'	, 'Auth\User\RegisterController@addressReqired')->name('addressreqired');
Route::any('uploaddocument/{id}', 'Auth\User\RegisterController@registerUploadDocument')->name('uploaddocument');
Route::get('login', 					'Auth\User\LoginController@showLoginForm')->name('login');
Route::post('login', 					'Auth\User\LoginController@login');
Route::post('logout', 					'Auth\User\LoginController@logout')->name('logout');


//Reset Password
Route::get('password/reset', 'Auth\User\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\User\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\User\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\User\ResetPasswordController@reset')->name('password.update');


Route::get('password/confirm', 'Auth\User\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\User\ConfirmPasswordController@confirm');

Route::get('email/verify', 'Auth\User\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\User\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\User\VerificationController@resend')->name('verification.resend');

//Static Pages
Route::get('{page_slug}', 'PageController@pageDetails')->name('pagedetails');
