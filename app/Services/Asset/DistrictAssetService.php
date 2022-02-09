<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\Asset;

use App\Cores\Remote\ZHttpClient;
use App\Services\Asset\Contracts\DistrictAssetServiceContract;
use App\Services\BaseService;
use GuzzleHttp\Promise;

class DistrictAssetService extends BaseService implements DistrictAssetServiceContract
{

    protected $withHeaderAuthToken = true;

    /**
     * CarrierAssetService constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $pathUrl = config("gateway.connection.asset.api_url") . '/districts';
        parent::__construct($pathUrl);
        $this->client = ZHttpClient::init($pathUrl);

    }

    /**
     * show data list
     * @return mixed
     * @throws Exception
     * @throws \Throwable
     */
    public function list()
    {
        try {

            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'GET',
                        $this->client->url("list?field=all"),
                        $headers
                    )
            ];

            $resultUnwrap = Promise\unwrap($promise);

            return $resultUnwrap['result'];

        } catch (\Exception $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw $e;
        }
    }

}
