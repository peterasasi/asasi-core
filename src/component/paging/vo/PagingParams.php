<?php

namespace by\component\paging\vo;


use by\infrastructure\base\BaseObject;
use by\infrastructure\helper\Object2DataArrayHelper;
use by\infrastructure\interfaces\ObjectToArrayInterface;

class PagingParams extends BaseObject implements ObjectToArrayInterface
{

    private $pageIndex;
    private $pageSize;

    // construct
    public function __construct($pageIndex = 0, $pageSize = 10)
    {
        parent::__construct();
        $this->setPageIndex($pageIndex);
        $this->setPageSize($pageSize);
    }

    /**
     * offset if pageIndex is 1 return 0, if 2 return pageSize if 3 return 2 * pageSize
     * @return float|int
     */
    public function offset()
    {
        $pageIndex = $this->getPageIndex() - 1;
        $pageIndex = $pageIndex < 0 ? 0 : $pageIndex;
        return $pageIndex * $this->getPageSize();
    }

    /**
     * @return mixed
     */
    public function getPageIndex()
    {
        return $this->pageIndex;
    }

    /**
     *
     * @param mixed $pageIndex
     */
    public function setPageIndex($pageIndex)
    {
        $this->pageIndex = ($pageIndex < 0 ? 0 : $pageIndex);
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * value bigger than One
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = ($pageSize < 1 ? 1 : $pageSize);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function toArray()
    {
        return Object2DataArrayHelper::getDataArrayFrom($this);
    }
}
