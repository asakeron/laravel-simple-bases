<?php

namespace LaravelSimpleBases\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use LaravelSimpleBases\Exceptions\BaseException;
use LaravelSimpleBases\Utils\StatusCodeUtil;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

abstract class BaseHandlerException extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        if (get_parent_class($e) === BaseException::class) {
            return $e->response();
        }

        if (get_class($e) === NotFoundHttpException::class) {
            return response_exception(
                'Route not found',
                StatusCodeUtil::BAD_REQUEST,
                $e->getFile(),
                $e->getLine(),
                $e->getTraceAsString(),
            );
        }

        return response_exception(
            $e->getMessage(),
            StatusCodeUtil::INTERNAL_SERVER_ERROR,
            $e->getFile(),
            $e->getLine(),
            $e->getTraceAsString(),
            [],
            true
        );
    }
}
