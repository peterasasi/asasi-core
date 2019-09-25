<?php

namespace by\component\exception;

use by\infrastructure\constants\BaseErrorCode;

class InvalidArgumentException extends BaseException
{
    /**
     * ClientIdLimitException constructor.
     * @param string|array $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct($message , $code = BaseErrorCode::Invalid_Parameter, \Throwable $previous = null)
    {
        parent::__construct('', $code, $previous);
        $this->message = $message;
    }
}
