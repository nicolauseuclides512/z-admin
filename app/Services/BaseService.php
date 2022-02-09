<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services;


use App\Cores\Remote\ZHttpClient;
use App\Services\Contracts\RestRemoteContract;
use App\Services\Override\RestRemoteTrait;
use GuzzleHttp\Psr7\Response;

abstract class BaseService implements RestRemoteContract
{
    use RestRemoteTrait;

    protected $client;

    protected $withHeaderAuthToken = false;

    public function __construct($pathUrl = null, array $headers = [])
    {
        $this->client = ZHttpClient::init($pathUrl, $headers);
    }
}
