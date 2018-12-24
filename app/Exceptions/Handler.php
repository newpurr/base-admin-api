<?php

namespace App\Exceptions;

use App\Constant\JsonResponseCode;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Prettus\Validator\Exceptions\ValidatorException;
use Psr\Container\NotFoundExceptionInterface;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        CustomException::class,
    ];
    
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception               $exception
     *
     * @return mixed
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof NotFoundExceptionInterface
            || $exception instanceof ModelNotFoundException) {
            return $this->json(json_error_response(JsonResponseCode::NOT_FOUND, '资源不存在'));
        }
        
        if ($exception instanceof CustomException) {
            return $this->json(json_error_response($exception->getCode(), $exception->getMessage()));
        }
        
        if ($exception instanceof AuthenticationException) {
            return $this->json(json_error_response(JsonResponseCode::UNAUTHORIZED, $exception->getMessage()));
        }
    
        if ($exception instanceof ValidatorException) {
            return $this->json(
                json_error_response(JsonResponseCode::PARAMETER_ERROR, $exception->getMessageBag()->first())
            );
        }
    
        return parent::render($request, $exception);
    }
    
    /**
     * json
     * @param \SuperHappysir\Support\Utils\Response\JsonResponseBodyInterface $response
     * @return \Illuminate\Http\JsonResponse
     */
    protected function json($response) : \Illuminate\Http\JsonResponse
    {
        return response()->json($response);
    }
}
