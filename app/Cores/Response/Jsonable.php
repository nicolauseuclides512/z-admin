<?php
/**
 * @author Jehan Afwazi Ahmad <jee.archer@gmail.com>.
 */


namespace App\Cores\Response;


use App\Exceptions\AppException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;

trait Jsonable
{
    public function safeDecode($input)
    {
        // Fix for PHP's issue with empty objects
        $input = preg_replace('/{\s*}/', "{\"EMPTY_OBJECT\":true}", $input);
        return json_decode($input, true);
    }

    public function safeEncode($input)
    {
        return preg_replace('/{"EMPTY_OBJECT"\s*:\s*true}/', '{}', json_encode($input, JSON_UNESCAPED_SLASHES));
    }

    protected function json($code = 200, $message = '', $data = null)
    {

        if (!is_null($data)) {
            if (method_exists($data, 'items')) {

                $previousPageUrl = (!empty($data->previousPageUrl())) ?
                    $data->previousPageUrl() . $this->requestTransl()['query'] :
                    $data->previousPageUrl();

                $nextPageUrl = (!empty($data->nextPageUrl())) ?
                    $data->nextPageUrl() . $this->requestTransl()['query'] :
                    $data->nextPageUrl();


                $currentPageUrl = (!empty($data->url($data->currentPage()))) ?
                    $data->url($data->currentPage()) . $this->requestTransl()['query'] :
                    $data->url($data->currentPage());


                $paginate = array(
                    'has_more_pages' => $data->hasMorePages(),
                    'count' => (int)$data->count(),
                    'total' => (int)$data->total(),
                    'per_page' => (int)$data->perPage(),
                    'current_page' => (int)$data->currentPage(),
                    'last_page' => (int)$data->lastPage(),
                    'prev_page_url' => $previousPageUrl,
                    'current_page_url' => $currentPageUrl,
                    'next_page_url' => $nextPageUrl
                );

                return response()->json(
                    array(
                        "code" => $code,
                        "message" => $message,
                        "data" => $data->items(),
                        "paginate" => $paginate
                    ), $code, []
                );
            }

            return response()->json(
                array(
                    "code" => $code,
                    "message" => $message,
                    "data" => $data
                ), $code, []
            );
        }
        return response()->json(
            array(
                "code" => $code,
                "message" => $message
            ), $code, []
        );
    }

    public function jsonErrors($data, $code = Response::HTTP_BAD_REQUEST, $message = '')
    {
        return $this->jsonExceptions($data);
    }

    public function jsonExceptions($data, $code = Response::HTTP_BAD_REQUEST, $message = '')
    {
        $error = null;

        switch (true) {
            case $data instanceof RequestException:
                //fixme get body null
                $resBody = $this->safeDecode($data->getResponse()->getBody());

                if (isset($resBody['code']) && isset($resBody['message'])) {
                    return $this->json(
                        isset($resBody['code']) ? $resBody['code'] : 500,
                        isset($resBody['message']) ? $resBody['message'] : "",
                        isset($resBody['data']) ? $resBody['data'] : []
                    );
                }

                $error = $this->json(
                    $data->getCode(),
                    $data->getMessage(),
                    []);

                Log::error("
                File: {$data->getFile()}, 
                Line: {$data->getLine()}, 
                $error");

                return $error;
                break;

            case $data instanceof AppException:

                $error = $this->json(
                    $data->getCode(),
                    $data->getMessage(),
                    $data->getCause()
                );

                Log::error("
                File: {$data->getFile()}, 
                Line: {$data->getLine()}, 
                $error");

                return $error;
                break;

            case $data instanceof QueryException:
                if (env('APP_ENV') === 'production') {
                    $error = $this->json(
                        Response::HTTP_INTERNAL_SERVER_ERROR,
                        'Query error founded.'
                    );
                } else {
                    $error = $this->json(
                        Response::HTTP_INTERNAL_SERVER_ERROR,
                        $data->getMessage()
                    );
                }

                Log::error("
                File: {$data->getFile()}, 
                Line: {$data->getLine()}, 
                $error");

                return $error;
                break;

            case $data instanceof \Exception:
                $error = $this->json(Response::HTTP_INTERNAL_SERVER_ERROR, $data->getMessage());

                Log::error("
                File: {$data->getFile()}, 
                Line: {$data->getLine()}, 
                $error");

                return $error;
                break;

            default:
                $error = $this->json($code, $message, $data);
                Log::error($error);
                return $error;

        }
    }

    function jsonGzSuccess(ResponseInterface $data, $code = Response::HTTP_OK, $message = 'Success response.')
    {
        $result = $this->safeDecode($data->getBody());

        if (isset($result['paginate'])) {
            if (isset($result['paginate']['current_page_url'])) {
                $parseCurrentUrl = parse_url($result['paginate']['current_page_url']);
                $result['paginate']['current_page_url'] = url('/') . $parseCurrentUrl['path'] . '?' . $parseCurrentUrl['query'];
            }

            if (isset($result['paginate']['next_page_url'])) {
                $parseNextUrl = parse_url($result['paginate']['next_page_url']);
                $result['paginate']['next_page_url'] = url('/') . $parseNextUrl['path'] . '?' . $parseNextUrl['query'];
            }

            if (isset($result['paginate']['prev_page_url'])) {
                $parsePrevUrl = parse_url($result['paginate']['prev_page_url']);
                $result['paginate']['prev_page_url'] = url('/') . $parsePrevUrl['path'] . '?' . $parsePrevUrl['query'];
            }
        }

        return response()->json($result, $code);
    }

    /**
     * @param ResponseInterface $response
     * @return array|\Illuminate\Support\Collection
     * @throws AppException
     */
    public function gzCollect(ResponseInterface $response)
    {
        $data = $this->safeDecode($response->getBody());

        if (in_array($data['code'], [500, 400, 300]) && $this->request->expectsJson()) {
            throw AppException::flash($data['code'], $data['message']);
        }

        return isset($data['data']) ? collect($data['data']) : [];
    }

    /**
     * @param ResponseInterface $response
     * @return array|\Illuminate\Support\Collection
     * @throws AppException
     */
    public function gzSingle(ResponseInterface $response)
    {
        $data = $this->safeDecode($response->getBody());

        if (in_array($data['code'], [500, 400, 300])) {
            if (!$this->request->expectsJson()) {
                session()->flash('errors', $data['message']);
                return redirect()->back();
            }

            throw AppException::flash($data['code'], $data['message']);
        }

        return $data['data'] ?? null;
    }
}
