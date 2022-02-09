<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\Store;

use App\Cores\Remote\ZHttpClient;
use App\Services\BaseService;
use App\Services\Store\Contracts\SalesChannelStoreServiceContract;

class SalesChannelStoreService extends BaseService implements SalesChannelStoreServiceContract
{

    protected $withHeaderAuthToken = true;

    /**
     * CarrierAssetService constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $pathUrl = config("gateway.connection.store.api_url") . '/sales-channels';
        parent::__construct($pathUrl);
        $this->client = ZHttpClient::init($pathUrl);

    }

}
