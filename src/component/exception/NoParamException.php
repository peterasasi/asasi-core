<?php
namespace by\component\exception;


use by\infrastructure\constants\BaseErrorCode;
use Throwable;

class NoParamException extends BaseException
{
    public function __construct($message = "", $code = BaseErrorCode::Lack_Parameter, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
