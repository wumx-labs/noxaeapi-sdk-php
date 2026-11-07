<?php

declare(strict_types=1);

namespace WumxLabs\NoxAeApi\Exceptions;

use Exception;

class NoxAeApiException extends Exception
{
    protected ?int $statusCode;
    protected mixed $responseBody;

    public function __construct(string $message = "", int $statusCode = 0, mixed $responseBody = null, ?\Throwable $previous = null)
    {
        parent::__construct($message, $statusCode, $previous);
        $this->statusCode = $statusCode;
        $this->responseBody = $responseBody;
    }

    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    public function getResponseBody(): mixed
    {
        return $this->responseBody;
    }
}
