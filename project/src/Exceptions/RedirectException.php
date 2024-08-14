<?php

namespace ProjectApp\Exceptions;

use JetBrains\PhpStorm\Pure;
use Throwable;

class RedirectException extends HttpException
{
    public function __construct(public readonly string $url, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}