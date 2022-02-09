<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers\Asset;

use App\Exceptions\AppException;
use App\Services\Asset\Contracts\CarrierAssetServiceContract;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CarrierAssetController extends AssetController
{
    protected $layout = 'carriers';

    protected $name = 'Carriers';

    protected $redirectTo = '/admin/assets/carriers';

    public function __construct(
        Request $request,
        CarrierAssetServiceContract $serviceContract)
    {
        parent::__construct($request, $serviceContract);
        $this->service = $serviceContract;
    }

    /**
     * @param Request $request
     * @return Request
     * @throws AppException
     */
    protected function _reqWrapper(Request $request): Request
    {
        $logo = $request->get('logo_url');

        if ($request->hasFile('logo_image')) {
            //upload image
            $validator = Validator::make($this->request->all(), [
                'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                throw AppException::inst(
                    "The given param invalid",
                    Response::HTTP_BAD_REQUEST,
                    $validator->errors()->all());
            }

            Storage::disk('s3')->delete($logo);

            $logo = env('AWS_URL') . '/' . $this->request
                    ->file('logo_image')
                    ->store('assets/carriers', 's3');
        }

        $request->merge([
            'is_default' => $request->get('is_default') === 'on' ?? false,
            'is_track_shipment_on' => $request->get('is_track_shipment_on') === 'on' ?? false,
            'is_shipping_cost_on' => $request->get('is_shipping_cost_on') === 'on' ?? false,
            'status' => $request->get('status') === 'on' ?? false,
            'logo' => $logo
        ]);

        return $request;
    }
}
