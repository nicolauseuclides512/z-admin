<?php

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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    if (Auth::check()) {
        return Redirect::to('/admin/dashboard');
    }
    return view('auth.login');
});

//Auth::routes();

Route::post('/login', 'Auth\LoginController@login');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {

    Route::get('', 'HomeController@index')
        ->name('dashboard');

    Route::get('/dashboard', 'HomeController@index')
        ->name('dashboard');


    Route::group(['prefix' => 'assets'], function () {
        Route::resource('carriers', 'Asset\CarrierAssetController');
        Route::resource('regions', 'Asset\RegionAssetController');
        Route::resource('districts', 'Asset\DistrictAssetController');
        Route::resource('provinces', 'Asset\ProvinceAssetController');
        Route::resource('countries', 'Asset\CountryAssetController');
    });

    //ongkir
    Route::group(['prefix' => 'ongkir'], function () {
        Route::resource('banners', 'Ongkir\BannerOngkirController');

        Route::resource('announcements', 'Ongkir\AnnouncementOngkirController');

        Route::get('ro-api-keys/total-usage', 'Ongkir\ROApiKeyOngkirController@totalUsage');
        Route::resource('ro-api-keys', 'Ongkir\ROApiKeyOngkirController');

        Route::get('caches', 'Ongkir\CacheOngkirController@index');
        Route::delete('caches/flush', 'Ongkir\CacheOngkirController@flushCache');
        Route::delete('caches/remove/{key}', 'Ongkir\CacheOngkirController@clearCacheByKey');

    });

    Route::group(['prefix' => 'stores'], function () {
        Route::resource('sales-channels', 'Store\SalesChannelStoreController');
    });


    Route::group(['prefix' => 'accounts/users'], function () {
        Route::get('', 'Account\UserAccountController@fetch');
    });

    //organizations
    Route::group(['prefix' => 'accounts/organizations'], function () {
        Route::get('', 'Account\OrganizationAccountController@fetch');
        Route::get('{id}', 'Store\OrganizationStoreController@show');
    });


});
