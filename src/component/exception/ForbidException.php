<?php
namespace by\component\exception;

class ForbidException extends BaseException
{
    public function __construct($message = "permission denied", $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
