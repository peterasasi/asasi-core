<?php

namespace by\infrastructure\constants;

/**
 * Class StatusEnum
 * @package by\infrastructure\constants
 */
class StatusEnum
{
    const SOFT_DELETE = -1;

    const ENABLE = 1;

    const DISABLED = 0;

    public static function getDesc($status)
    {
        switch ($status) {
            case StatusEnum::DISABLED:
                return "已禁用";
            case StatusEnum::ENABLE:
                return "启用";
            case StatusEnum::SOFT_DELETE:
                return "已删除";
            default:
                return "未知";
        }
    }
}
