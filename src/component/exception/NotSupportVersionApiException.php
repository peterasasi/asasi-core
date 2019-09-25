<?php

namespace by\component\exception;


use by\infrastructure\constants\BaseErrorCode;
use Throwable;

class NotSupportVersionApiException extends BaseException
{
    public function __construct($message = "", $code = BaseErrorCode::Api_Need_Update, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
