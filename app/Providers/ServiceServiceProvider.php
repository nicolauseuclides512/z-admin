<?php

namespace App\Providers;

use App\Services\Account\Contracts\UserAccountServiceContract;
use App\Services\Account\Contracts\OrganizationAccountServiceContract;
use App\Services\Account\UserAccountService;
use App\Services\Account\OrganizationAccountService;
use App\Services\Asset\CarrierAssetService;
use App\Services\Asset\Contracts\CarrierAssetServiceContract;
use App\Services\Asset\Contracts\DistrictAssetServiceContract;
use App\Services\Asset\Contracts\RegionAssetServiceContract;
use App\Services\Asset\DistrictAssetService;
use App\Services\Asset\RegionAssetService;
use App\Services\Ongkir\AnnouncementOngkirService;
use App\Services\Ongkir\BannerOngkirService;
use App\Services\Ongkir\CacheOngkirService;
use App\Services\ongkir\Contracts\AnnouncementOngkirServiceContract;
use App\Services\Ongkir\Contracts\BannerOngkirServiceContract;
use App\Services\ongkir\Contracts\CacheOngkirServiceContract;
use App\Services\ongkir\Contracts\ROApiKeyOngkirServiceContract;
use App\Services\Ongkir\ROApiKeyOngkirService;
use App\Services\Store\Contracts\SalesChannelStoreServiceContract;
use App\Services\Store\SalesChannelStoreService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->_registerAsset();
        $this->_registerOngkir();
        $this->_registerStore();
        $this->_registerAccount();
    }

    private function _registerAsset()
    {
        $this->app->singleton(CarrierAssetServiceContract::class, CarrierAssetService::class);
        $this->app->singleton(RegionAssetServiceContract::class, RegionAssetService::class);
        $this->app->singleton(DistrictAssetServiceContract::class, DistrictAssetService::class);
    }

    private function _registerOngkir()
    {
        $this->app->singleton(BannerOngkirServiceContract::class, BannerOngkirService::class);
        $this->app->singleton(AnnouncementOngkirServiceContract::class, AnnouncementOngkirService::class);
        $this->app->singleton(ROApiKeyOngkirServiceContract::class, ROApiKeyOngkirService::class);
        $this->app->singleton(CacheOngkirServiceContract::class, CacheOngkirService::class);
    }

    private function _registerStore()
    {
        $this->app->singleton(SalesChannelStoreServiceContract::class, SalesChannelStoreService::class);
    }

    private function _registerAccount()
    {
        $this->app->singleton(UserAccountServiceContract::class, UserAccountService::class);
        $this->app->singleton(OrganizationAccountServiceContract::class, OrganizationAccountService::class);
    }
}
