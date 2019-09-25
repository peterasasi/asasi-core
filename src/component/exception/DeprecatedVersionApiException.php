<?php

namespace by\component\exception;


use by\infrastructure\constants\BaseErrorCode;
use Throwable;

class DeprecatedVersionApiException extends BaseException
{
    public function __construct($message = "", $code = BaseErrorCode::Api_Service_Is_Deprecated, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
