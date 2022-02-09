<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\Ongkir;


use App\Services\BaseService;
use App\Services\ongkir\Contracts\AnnouncementOngkirServiceContract;
use GuzzleHttp\Promise;

class AnnouncementOngkirService extends BaseService implements AnnouncementOngkirServiceContract
{
    protected $withHeaderAuthToken = true;

    public function __construct()
    {
        parent::__construct(
            config("gateway.connection.ongkir.api_url") . '/announcements'
        );
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
                        $this->client->url("no-cache-list"),
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
