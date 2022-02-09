<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers\Ongkir;


use App\Exceptions\AppException;
use App\Services\ongkir\Contracts\AnnouncementOngkirServiceContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnnouncementOngkirController extends OngkirController
{
    protected $layout = 'announcements';

    protected $name = 'Announcements';

    protected $redirectTo = '/admin/ongkir/announcements';

    public function __construct(
        Request $request,
        AnnouncementOngkirServiceContract $serviceContract)
    {
        parent::__construct($request, $serviceContract);
    }

    /**
     * @param Request $request
     * @return Request
     * @throws AppException
     */
    protected function _reqWrapper(Request $request): Request
    {
        $imageUrl = $request->get('image_url');

        if ($request->hasFile('image')) {
            //upload image
            $validator = Validator::make($this->request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                throw AppException::inst(
                    "The given param invalid",
                    Response::HTTP_BAD_REQUEST,
                    $validator->errors()->all());
            }

            Storage::disk('s3')->delete($imageUrl);

            $imageUrl = env('AWS_URL') . '/' . $this->request
                    ->file('image')
                    ->store('assets/ongkir/announcement', 's3');
        }

        $request->merge([
            'status' => $request->get('status') === 'on' ?? false,
            'playstore' => $request->get('playstore') === 'on' ?? false,
            'image_url' => $imageUrl
        ]);

        return $request;
    }
}
