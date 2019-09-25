<?php

namespace by\infrastructure\base;


use by\infrastructure\helper\Object2DataArrayHelper;
use by\infrastructure\interfaces\ObjectToArrayInterface;

abstract class BaseEntity extends BaseObject implements ObjectToArrayInterface
{

    private $id;

    // member function

    // construct
    private $createTime;

    // override function __toString()

    // member variables
    private $updateTime;//

    public function __construct()
    {
        $this->setCreateTime(time());
        $this->setUpdateTime(time());
    } //

    public function toArray()
    {
        return Object2DataArrayHelper::getDataArrayFrom($this);
    }

    // getter setter

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param mixed $createTime
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * @return mixed
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * @param mixed $updateTime
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }


}
