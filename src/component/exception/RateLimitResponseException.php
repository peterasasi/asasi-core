<?php
namespace by\component\exception;


use by\infrastructure\constants\BaseErrorCode;
use Throwable;

class RateLimitResponseException extends BaseException
{
    public function __construct($message = '' , $code = BaseErrorCode::Api_Request_Rate_Limit, Throwable $previous = null)
    {
        parent::__construct("api request rate limit", $code, $previous);
    }

}
