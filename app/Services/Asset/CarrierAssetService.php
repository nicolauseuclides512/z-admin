<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\Asset;

use App\Cores\Remote\ZHttpClient;
use App\Services\Asset\Contracts\CarrierAssetServiceContract;
use App\Services\BaseService;

class CarrierAssetService extends BaseService implements CarrierAssetServiceContract
{

    protected $withHeaderAuthToken = true;

    /**
     * CarrierAssetService constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $pathUrl = config("gateway.connection.asset.api_url") . '/carriers';
        parent::__construct($pathUrl);
        $this->client = ZHttpClient::init($pathUrl);

    }

}
