<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Http\Controllers\Admin\Override;

use App\Exceptions\AppException;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

trait RestControllerTrait
{
    /**
     * @param Request $request
     * @return Request
     */
    protected function _reqWrapper(Request $request): Request
    {
        return $request;
    }

    /**
     * @return array
     */
    protected function _resource()
    {
        return [];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    protected function index()
    {
        $request = $this->request;
        if ($request->expectsJson()) {
            try {

                if ($request->get('use_dt') === 'true') {
                    return Datatables::collection(
                        $this->gzCollect(
                            $this->service->list()
                        )
                    )->make(true);
                } else {
                    return $this->jsonGzSuccess(
                        $this->service->index($this->request)
                    );
                }
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

    /**
     * @return $this
     */
    protected function create()
    {
        return view("$this->rootLayout.$this->layout.create")
            ->with($this->_resource());
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws AppException
     */
    protected function store()
    {
        try {

            $data = $this->gzCollect(
                $this->service->store(
                    $this->_reqWrapper($this->request)
                )
            );

            if ($data->has('errors')) {
                session()->flash('errors', $data->get('errors'));
                return redirect()->back();
            }

            return redirect($this->redirectTo)->with('status', 'Data saved!');

        } catch (Exception $e) {
            if ($this->request->expectsJson()) {
                return $this->jsonExceptions($e);
            }

            session()->flash('errors', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    protected function edit($id)
    {
        try {
            $data = $this->gzCollect(
                $this->service->edit($id)
            )->toArray();

            return view("$this->rootLayout.$this->layout.edit")->with($data);

        } catch (Exception $e) {
            if ($this->request->expectsJson()) {
                return $this->jsonExceptions($e);
            }

            session()->flash('errors', $e->getMessage());
            return redirect()->back();
        } catch (AppException $e) {
            if ($this->request->expectsJson()) {
                return $this->jsonExceptions($e);
            }
            session()->flash('errors', $e->getCause());
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function update($id)
    {
        try {
            $data = $this->gzCollect(
                $this->service->update(
                    $id,
                    $this->_reqWrapper($this->request)
                )
            );

            if ($data->has('errors')) {
                session()->flash('errors', $data->get('errors'));
                return redirect()->back();
            }

            return redirect($this->redirectTo)->with('status', 'Data updated!');

        } catch (Exception $e) {
            if ($this->request->expectsJson()) {
                return $this->jsonExceptions($e);
            }

            session()->flash('errors', $e->getMessage());
            return redirect()->back();
        } catch (AppException $e) {
            if ($this->request->expectsJson()) {
                return $this->jsonExceptions($e);
            }
            session()->flash('errors', $e->getCause());
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|mixed|null
     * @throws AppException
     */
    protected function destroy($id)
    {
        try {
            $data = $this->gzCollect($this->service->destroy($id));

            if ($data->has('errors')) {
                throw AppException::flash(
                    Response::HTTP_UNPROCESSABLE_ENTITY,
                    "Remove data failed.",
                    $data->errors
                );
            }

            if ($this->request->expectsJson()) {
                return $this->json(
                    Response::HTTP_OK,
                    "Remove data successfully.",
                    $data
                );
            }

            return redirect($this->redirectTo)
                ->with('status', 'Data deleted!');

        } catch (Exception $e) {
            if ($this->request->expectsJson()) {
                return $this->jsonExceptions($e);
            }

            session()->flash('errors', $e->getMessage());
            return redirect()->back();

        }
    }
}
