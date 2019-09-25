<?php


namespace by\component\picture\entity;


use by\infrastructure\base\BaseEntity;
use by\infrastructure\helper\Object2DataArrayHelper;
use by\infrastructure\interfaces\ObjectToArrayInterface;

class PictureEntity extends BaseEntity implements ObjectToArrayInterface
{
    private $ext;
    private $type;
    private $status;
    private $url;
    private $size;
    private $oriName;
    private $saveName;
    /**
     * resource uri
     * @var string
     */
    private $primaryFileUri;
    /**
     * file md5
     * @var string
     */
    private $md5;
    /**
     * file sha1
     * @var string
     */
    private $sha1;

    public function __construct()
    {
        parent::__construct();
    }


    // construct

    public function toArray()
    {
        return Object2DataArrayHelper::getDataArrayFrom($this);
    }

    /**
     * @return mixed
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * @param mixed $ext
     */
    public function setExt($ext)
    {
        $this->ext = $ext;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getOriName()
    {
        return $this->oriName;
    }

    /**
     * @param mixed $oriName
     */
    public function setOriName($oriName)
    {
        $this->oriName = $oriName;
    }

    /**
     * @return mixed
     */
    public function getSaveName()
    {
        return $this->saveName;
    }

    /**
     * @param mixed $saveName
     */
    public function setSaveName($saveName)
    {
        $this->saveName = $saveName;
    }

    /**
     * @return string
     */
    public function getPrimaryFileUri()
    {
        return $this->primaryFileUri;
    }

    /**
     * @param string $primaryFileUri
     */
    public function setPrimaryFileUri($primaryFileUri)
    {
        $this->primaryFileUri = $primaryFileUri;
    }

    /**
     * @return string
     */
    public function getMd5()
    {
        return $this->md5;
    }

    /**
     * @param string $md5
     */
    public function setMd5($md5)
    {
        $this->md5 = $md5;
    }

    /**
     * @return string
     */
    public function getSha1()
    {
        return $this->sha1;
    }

    /**
     * @param string $sha1
     */
    public function setSha1($sha1)
    {
        $this->sha1 = $sha1;
    }
}
