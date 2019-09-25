<?php

namespace by\infrastructure\base;


use by\infrastructure\helper\Object2DataArrayHelper;
use by\infrastructure\interfaces\ToJsonStringInterfaces;

abstract class BaseJsonObject extends BaseObject implements ToJsonStringInterfaces
{

    // member function
    public function __toString()
    {
        return $this->toJsonString();
    }

    // override function __toString()

    function toJsonString()
    {
        $data = Object2DataArrayHelper::getDataArrayFrom($this);
        // JSON_UNESCAPED_UNICODE
        return json_encode($data);
    }

    // member variables

    // getter setter

}
