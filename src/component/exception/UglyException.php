<?php

namespace by\component\exception;

use by\infrastructure\constants\BaseErrorCode;
use Throwable;

class UglyException extends BaseException
{
    public function __construct($message = "", $code = BaseErrorCode::Api_EXCEPTION, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
