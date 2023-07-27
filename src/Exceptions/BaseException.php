<?php

namespace LaravelSimpleBases\Exceptions;

use Exception;

abstract class BaseException extends Exception
{
    protected int $statusCode;
    protected array $fields = [];

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getFields(): array
    {
        return $this->fields;
    }
    
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    public function response(): \Illuminate\Http\JsonResponse
    {
        return response_exception(
            $this->getMessage(),
            $this->getStatusCode(),
            $this->getFile(),
            $this->getLine(),
            $this->getTraceAsString(),
            $this->getFields()
        );
    }
}
