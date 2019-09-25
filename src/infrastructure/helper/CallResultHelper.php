<?php

namespace by\infrastructure\helper;

use by\infrastructure\base\CallResult;

/**
 * 所有调用结果的帮助
 * Class CallResultHelper
 * @package by\infrastructure
 */
class CallResultHelper
{

    // member function

    public function __construct()
    {
        // TODO construct
    }

    public static function success($data = '', $msg = 'success', $code = 0)
    {
        if ($msg === 'success') $msg = LangHelper::lang($msg);

        return new CallResult($data, $msg, $code);
    }

    // construct

    public static function fail($msg = 'fail', $data = '', $code = -1)
    {
        if ($msg === 'fail') $msg = LangHelper::lang($msg);
        return new CallResult($data, $msg, $code);
    }

    // override function __toString()

    // member variables

    // getter setter

}
