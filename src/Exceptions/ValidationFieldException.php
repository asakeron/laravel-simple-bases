<?php

namespace LaravelSimpleBases\Exceptions;

use LaravelSimpleBases\Utils\StatusCodeUtil;
use Throwable;

class ValidationFieldException extends BaseException
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->statusCode = StatusCodeUtil::BAD_REQUEST;
    }
}
