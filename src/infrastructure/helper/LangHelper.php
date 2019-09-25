<?php


namespace by\infrastructure\helper;


/**
 * Class LangHelper
 * 语言帮助类
 * @package by\component\lang\helper
 */
class LangHelper
{
    /**
     * lang函数如果存在则调用lang函数
     * @param $name
     * @param array $vars
     * @param string $lang
     * @return mixed
     */
    public static function lang($name, $vars = [], $lang = '')
    {
        if (function_exists('lang')) {
            return lang($name, $vars, $lang);
        }

        return $name;
    }
}
