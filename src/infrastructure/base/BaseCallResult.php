<?php

namespace by\infrastructure\base;


abstract class BaseCallResult
{

    // member function
    private $code;

    // override function __toString()

    // member variables
    private $msg;//
    private $data;//

    public function __construct($data = '', $msg = '', $code = 0)
    {
        $this->setCode($code);
        $this->setMsg($msg);
        $this->setData($data);
    }//

    // getter setter

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}
