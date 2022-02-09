<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\Ongkir;


use App\Services\BaseService;
use App\Services\ongkir\Contracts\CacheOngkirServiceContract;
use GuzzleHttp\Promise;

class CacheOngkirService extends BaseService implements CacheOngkirServiceContract
{
    protected $withHeaderAuthToken = true;

    public function __construct()
    {
        parent::__construct(
            config("gateway.connection.ongkir.api_url") . '/caches'
        );
    }

    /**
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function fetchCache()
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
                        $this->client->url(""),
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

    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function clearCacheByKey($key)
    {
        try {
            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'DELETE',
                        $this->client->url("remove/$key"),
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

    /**
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function flushCache()
    {
        try {
            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'DELETE',
                        $this->client->url("flush"),
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
