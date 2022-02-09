<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Cores\Remote;


use App\Cores\TokenGen;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ZHttpClient extends Client
{
    private $url;

    private $header;

    public static function init($url, array $header = [])
    {
        $me = new self();
        $me->url = $url;
        $me->header = ['headers' => $header];

        return $me;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function withToken(): array
    {
        $this->header['headers'] = array_merge(
            $this->header['headers'],
            [
                'Authorization' => 'Bearer ' . TokenGen::createToken(),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        );

        return $this->header;
    }

    /**
     * @param $targetUrl
     * @return mixed
     */
    public function url($targetUrl)
    {
        $targetUrl = !empty($targetUrl) ? "/$targetUrl" : "";
        $url = $this->url . $targetUrl;
        Log::info('Http Request to ' . $url);
        return $url;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param mixed $header
     * @return ZHttpClient
     */
    public function setHeader($header): ZHttpClient
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @param mixed $url
     * @return ZHttpClient
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }


}
