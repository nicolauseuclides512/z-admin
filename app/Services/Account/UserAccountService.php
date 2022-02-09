<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\Account;

use App\Cores\Remote\ZHttpClient;
use App\Services\Account\Contracts\UserAccountServiceContract;
use App\Services\BaseService;
use GuzzleHttp\Promise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserAccountService extends BaseService implements UserAccountServiceContract
{

    protected $withHeaderAuthToken = true;

    /**
     * CarrierAssetService constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $pathUrl = config("gateway.connection.account.api_url") . '/users';
        $this->client = ZHttpClient::init($pathUrl);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function fetchUsers(Request $request)
    {
        try {
            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $options = array_merge($headers, [
                'json' => $request->all()
            ]);

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'GET',
                        $this->client->url(""),
                        $options
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
