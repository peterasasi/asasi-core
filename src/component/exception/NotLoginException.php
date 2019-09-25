<?php
namespace by\component\exception;



use by\infrastructure\constants\BaseErrorCode;

class NotLoginException extends BaseException
{
    public function __construct($message = "", $code = BaseErrorCode::Api_Need_Login, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
