<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers\Asset;

use App\Services\Asset\Contracts\RegionAssetServiceContract;
use Illuminate\Http\Request;

class RegionAssetController extends AssetController
{
    protected $layout = 'regions';

    protected $name = 'Regions';

    protected $redirectTo = '/admin/assets/regions';

    public function __construct(
        Request $request,
        RegionAssetServiceContract $serviceContract)
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
            'is_priority' => $request->get('is_priority') === 'on' ?? false,
            'status' => $request->get('status') === 'on' ?? false,
        ]);

        return $request;
    }
}
