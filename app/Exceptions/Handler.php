<?php

namespace App\Exceptions;

use App\Constant\JsonResponseCode;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Prettus\Validator\Exceptions\ValidatorException;

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
        $jsonResponse = json_response();
        if ($exception instanceof CustomException) {
            logger($exception->getMessage(), $request->all());
            
            return response()->json($jsonResponse->formatAsError($exception->getCode(), $exception->getMessage()));
        }
    
        if ($exception instanceof ValidatorException) {
            return response()->json(
                $jsonResponse->format(JsonResponseCode::PARAMETER_ERROR, $exception->getMessageBag()->first())
            );
        }
    
        return parent::render($request, $exception);
    }
}
