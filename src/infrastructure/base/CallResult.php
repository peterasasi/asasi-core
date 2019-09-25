<?php
namespace by\infrastructure\base;


use by\infrastructure\helper\Object2DataArrayHelper;

class CallResult extends BaseCallResult
{

    public function __construct($data = '', $msg = '', $code = 0)
    {
        parent::__construct($data, $msg, $code);
    }

    /**
     * @return bool
     */
    public function isFail()
    {
        return $this->getCode() != 0;
    }

    // construct

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->getCode() == 0;
    }

    public function __toString()
    {
        // JSON_UNESCAPED_UNICODE
        return json_encode(Object2DataArrayHelper::getDataArrayFrom($this));
    }

}
