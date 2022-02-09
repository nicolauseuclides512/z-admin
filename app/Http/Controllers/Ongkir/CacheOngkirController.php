<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers\Ongkir;

use App\Exceptions\AppException;
use App\Services\ongkir\Contracts\CacheOngkirServiceContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class CacheOngkirController extends OngkirController
{
    protected $layout = 'caches';

    protected $name = 'Caches';

    protected $redirectTo = '/admin/ongkir/caches';

    public function __construct(
        Request $request,
        CacheOngkirServiceContract $serviceContract)
    {
        parent::__construct($request, $serviceContract);
        $this->service = $serviceContract;
    }

    protected function index()
    {
        if ($this->request->expectsJson()) {
            try {
                return Datatables::collection(
                    $this->gzCollect(
                        $this->service->fetchCache()
                    )
                )->make(true);
            } catch (AppException $e) {
                if ($this->request->expectsJson()) {
                    return $this->jsonExceptions($e);
                }

                session()->flash('errors', $e->getMessage());
                return redirect()->back();
            }
        }

        return view("$this->rootLayout.$this->layout.index");
    }

    public function clearCacheByKey($key)
    {
        try {
            return $this->json(
                Response::HTTP_OK,
                "Remove cache by key " . $key,
                $this->gzSingle(
                    $this->service->clearCacheByKey($key)
                )
            );
        } catch (AppException $e) {
            return $this->jsonExceptions($e);
        }
    }

    public function flushCache()
    {
        try {
            return $this->json(
                Response::HTTP_OK,
                "Remove all cache ",
                $this->gzSingle(
                    $this->service->flushCache()
                )
            );
        } catch (AppException $e) {
            return $this->jsonExceptions($e);
        }
    }
}
