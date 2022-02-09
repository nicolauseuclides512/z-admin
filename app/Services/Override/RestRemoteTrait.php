<?php
/**
 * @author Jehan Afwazi Ahmad <jee.archer@gmail.com>.
 */

namespace App\Services\Override;

use Exception;
use GuzzleHttp\Promise;
use Illuminate\Http\Request;

/**
 * Trait RestRemoteControllerTrait
 * default controller function
 * @package App\Http\Controllers\Base
 */
trait RestRemoteTrait
{
    /**
     * internal function. this will call in create and edit function
     * @return array
     */
    public function _resource()
    {
        return [];
    }

    /**
     * show data list with filter, sorting and pagination
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws Exception
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        try {
            $queryString = $request->getQueryString();
            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'GET',
                        $this->client->url("?$queryString"),
                        $headers
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

    /**
     * show data when create
     * @return mixed
     */
    public function create()
    {
        return $this->_resource();
    }

    /**
     * store input data
     * @param Request $request
     * @return mixed
     * @throws Exception
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        try {
            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'POST',
                        $this->client->url(""),
                        array_merge(
                            $headers,
                            ['json' => $request->all()]
                        )
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

    /**
     * show data by id
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \Throwable
     */
    public function show($id)
    {
        try {
            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'GET',
                        $this->client->url("$id"),
                        $headers
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

    /**
     * show edit data by id
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \Throwable
     */
    public function edit($id)
    {
        try {
            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'GET',
                        $this->client->url("$id/edit"),
                        $headers
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

    /**
     * update data from input by particular id
     * @param $id
     * @param Request $request
     * @return mixed
     * @throws Exception
     * @throws \Throwable
     */
    public function update($id, Request $request)
    {
        try {
            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'PUT',
                        $this->client->url("$id"),
                        array_merge(
                            $headers,
                            ['json' => $request->all()]
                        )
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

    /**
     * remove data by id
     * @param $id
     * @return mixed
     * @throws Exception
     * @throws \Throwable
     */
    public function destroy($id)
    {
        try {
            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'DELETE',
                        $this->client->url($id),
                        $headers
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

    /**
     * show data list
     * @return mixed
     * @throws Exception
     * @throws \Throwable
     */
    public function list()
    {
        try {

            $headers = $this->withHeaderAuthToken
                ? $this->client->withToken()
                : [];

            $promise = [
                'result' => $this
                    ->client
                    ->requestAsync(
                        'GET',
                        $this->client->url("list"),
                        $headers
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
