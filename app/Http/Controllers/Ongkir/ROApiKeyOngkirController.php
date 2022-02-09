<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers\Ongkir;

use App\Exceptions\AppException;
use App\Services\ongkir\Contracts\ROApiKeyOngkirServiceContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ROApiKeyOngkirController extends OngkirController
{
    protected $layout = 'roapikeys';

    protected $name = 'RO Api Key';

    protected $redirectTo = '/admin/ongkir/ro-api-keys';

    public function __construct(
        Request $request,
        ROApiKeyOngkirServiceContract $serviceContract)
    {
        parent::__construct($request, $serviceContract);
        $this->service = $serviceContract;
    }

    public function totalUsage()
    {
        try {
            return $this->json(
                Response::HTTP_OK,
                "get total key usage",
                $this->gzSingle(
                    $this->service->totalUsage()
                )
            );
        } catch (AppException $e) {
            return $this->jsonExceptions($e);
        }
    }
}
