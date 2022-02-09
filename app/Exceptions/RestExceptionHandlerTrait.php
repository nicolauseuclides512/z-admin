<?php

namespace App\Exceptions;


use App\Cores\Response\Jsonable;
use BadMethodCallException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait RestExceptionHandlerTrait
{

    use Jsonable;

    /**
     * Creates a new JSON response based on exception type.
     *
     * @param Request $request
     * @param Exception $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getJsonResponseForException(Request $request,
                                                   Exception $e)
    {
        switch (true) {
            case $this->isBadRequestHttpException($e):
                $res = $this->badRequest($e);
                break;

            case $this->isNotFoundHttpException($e):
                $res = $this->notFoundHttpException($e);
                break;

            case $this->isBadMethodCallException($e):
                $res = $this->badMethodCallException($e);
                break;

            case $this->isSwiftTransport($e):
                $res = $this->swiftTransportException($e);
                break;

            case $this->isAppException($e):
                $res = $this->appException($e);
                break;

            case $this->isValidationException($e):
                $res = $this->validationException($e);
                break;

            default:
                $res = $this->jsonResponse([
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ], 500);
        }

        return $res;
    }

    //BadRequestHttpException
    protected function isBadRequestHttpException(Exception $e)
    {
        return $e instanceof BadRequestHttpException;
    }

    protected function badRequest(BadRequestHttpException $e, $statusCode = Response::HTTP_BAD_REQUEST)
    {
        Log::error("BadRequestHttpException 
        File: {$e->getFile()}, 
        Line: {$e->getLine()}, 
        Msg: {$e->getMessage()}");

        return $this->jsonResponse([
            'code' => Response::HTTP_BAD_REQUEST,
            'message' => $e->getMessage()
        ], $statusCode);
    }

    //ModelNotFoundException
    protected function isModelNotFoundException(Exception $e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function modelNotFound(ModelNotFoundException $e, $statusCode = Response::HTTP_BAD_REQUEST)
    {
        Log::error("ModelNotFoundException 
        File: {$e->getFile()}, 
        Line: {$e->getLine()}, 
        Msg: {$e->getMessage()}");

        return $this->jsonResponse([
            'code' => Response::HTTP_BAD_REQUEST,
            'message' => $e->getMessage()
        ], $statusCode);
    }

    //NotFoundHttpException
    protected function isNotFoundHttpException(Exception $e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function notFoundHttpException(NotFoundHttpException $e, $statusCode = Response::HTTP_BAD_REQUEST)
    {
        Log::error("NotFoundHttpException 
        File: {$e->getFile()}, 
        Line: {$e->getLine()}, 
        Msg: {$e->getMessage()}");

        return $this->jsonResponse([
            'code' => Response::HTTP_BAD_REQUEST,
            'message' => $e->getMessage()
        ], $statusCode);
    }


    //BadMethodCallException
    protected function isBadMethodCallException(Exception $e)
    {
        return $e instanceof BadMethodCallException;
    }

    protected function badMethodCallException(BadMethodCallException $e)
    {
        Log::error("BadMethodCallException 
        File: {$e->getFile()}, 
        Line: {$e->getLine()}, 
        Msg: {$e->getMessage()}");

        return $this->jsonResponse([
            'code' => Response::HTTP_NOT_FOUND,
            'message' => $e->getMessage()
        ], 404);

    }

    //AppException
    protected function isAppException(Exception $e)
    {
        return $e instanceof AppException;
    }

    protected function appException(AppException $e)
    {

        Log::error("AppException 
        File: {$e->getFile()}, 
        Line: {$e->getLine()}, 
        Msg: {$e->getMessage()}");

        return $this->jsonResponse([
            'code' => $e->getCode(),
            'message' => $e->getMessage(),
            'data' => $e->getCause()
        ], $e->getCode() ? $e->getCode() : 500);

    }

    //Swift_TransportException
    protected function isSwiftTransport(Exception $e)
    {
        return $e instanceof \Swift_TransportException;
    }

    protected function swiftTransportException(\Swift_TransportException $e)
    {
        Log::error("Exception 
        File: {$e->getFile()}, 
        Line: {$e->getLine()}, 
        Msg: {$e->getMessage()}");

        return $this->jsonResponse([
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $e->getMessage(),
        ], $e->getCode() ? $e->getCode() : 500);
    }

    //ValidationException
    protected function isValidationException(Exception $e)
    {
        return $e instanceof ValidationException;
    }

    protected function validationException(ValidationException $e)
    {
        Log::error("ValidationException 
        File: {$e->getFile()}, 
        Line: {$e->getLine()}, 
        Msg: " . $e->validator->errors()->toJson());

        return $this->jsonResponse([
            'code' => Response::HTTP_BAD_REQUEST,
            'message' => $e->getMessage(),
            'data' => $e->validator->errors()->all()
        ], $e->getCode() ? $e->getCode() : 500);

    }

    /**
     * Returns json response.
     *
     * @param array|null $payload
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse(array $payload = null, $statusCode = Response::HTTP_NOT_FOUND)
    {
        $payload = $payload ?: [];

        return response()->json($payload, $statusCode);
    }

}
