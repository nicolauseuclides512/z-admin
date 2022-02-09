<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers\Store;

use App\Exceptions\AppException;
use App\Services\Store\Contracts\SalesChannelStoreServiceContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SalesChannelStoreController extends StoreController
{
    protected $layout = 'sales_channels';

    protected $name = 'Sales_Channels';

    protected $redirectTo = '/admin/stores/sales-channels';

    public function __construct(
        Request $request,
        SalesChannelStoreServiceContract $serviceContract)
    {
        parent::__construct($request, $serviceContract);
        $this->service = $serviceContract;
    }

    protected function edit($id)
    {
        try {
            $data = $this->gzCollect(
                $this->service->edit($id)
            )->toArray();

            $data = $data['sales_channel'];

            return view("$this->rootLayout.$this->layout.edit")
                ->with(['data' => $data]);

        } catch (Exception $e) {
            if ($this->request->expectsJson()) {
                return $this->jsonExceptions($e);
            }

            $message = $e->getMessage();
            if ($e instanceof AppException)
                $message = $e->getCause();

            session()->flash('errors', $message);
            return redirect()->back();
        }
    }

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
                    ->store('assets/store/sales-channels', 's3');
        }

        $request->merge([
            'logo' => $logo
        ]);

        return $request;
    }

}
