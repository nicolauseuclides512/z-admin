<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers\Asset;

use App\Services\Asset\Contracts\DistrictAssetServiceContract;
use Illuminate\Http\Request;

class DistrictAssetController extends AssetController
{
    protected $layout = 'districts';

    protected $name = 'Districts';

    protected $redirectTo = '/admin/assets/districts';

    public function __construct(
        Request $request,
        DistrictAssetServiceContract $serviceContract)
    {
        parent::__construct($request, $serviceContract);
        $this->service = $serviceContract;
    }

    /**
     * @param Request $request
     * @return Request
     */
    protected function _reqWrapper(Request $request): Request
    {
        $request->merge([
            'status' => $request->get('status') === 'on' ?? false,
        ]);

        return $request;
    }
}
