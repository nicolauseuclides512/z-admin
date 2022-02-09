<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\Ongkir;

use App\Services\BaseService;
use App\Services\Ongkir\Contracts\BannerOngkirServiceContract;
use App\Services\ongkir\Contracts\ROApiKeyOngkirServiceContract;
use GuzzleHttp\Promise;

class ROApiKeyOngkirService extends BaseService implements ROApiKeyOngkirServiceContract
{
    protected $withHeaderAuthToken = true;

    public function __construct()
    {
        parent::__construct(
            config("gateway.connection.ongkir.api_url") . '/ro-api-keys'
        );
    }

    /**
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function totalUsage()
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
                        $this->client->url("total-usage"),
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
