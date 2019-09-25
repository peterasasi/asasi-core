<?php
namespace by\component\helper;


use by\infrastructure\base\CallResult;
use by\infrastructure\helper\CallResultHelper;

class ValidateHelper
{

    /**
     * @param $digit
     * @return bool
     */
    public static function isZeroOrOne($digit)
    {
        if (strlen($digit) > 0) {
            $digit = intval($digit);
            return $digit === 0 || $digit === 1;
        }
        return false;
    }

    /**
     * @param $str
     * @return bool
     */
    public static function isNumberStr($str)
    {
        return !is_resource($str) && !is_array($str) && !is_object($str) && (is_int($str) || is_numeric($str) || preg_match('/^\d*$/', $str));
    }

    /**
     * @param $password
     * @return CallResult
     */
    public static function legalPwd($password)
    {
        if (strlen($password) < 6 || strlen($password) > 64) {
            return CallResultHelper::fail('password length must between 6-64');
        }
        if (!preg_match("/^[0-9a-zA-Z\\\\,.?><;:!@#$%^&*()_+-=\[\]\{\}\|]{6,64}$/", $password)) {
            return CallResultHelper::fail('password is illegal');
        }
        return CallResultHelper::success();
    }

    /**
     * @param $str
     * @return bool
     */
    public static function isMobile($str)
    {
        if (is_string($str) && preg_match("/^1\d{10}$/", $str)) {
            return true;
        }
        if (is_string($str) && strlen($str) > 1) {
            $ch = substr($str, 0, 1);
            if (intval($ch) > 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $result array
     * @return bool
     */
    public static function legalArrayResult($result)
    {

        if (isset($result['info']) && isset($result['status']) && $result['status'] && is_array($result['info']) && count($result['info']) > 0) {
            return true;
        }

        return false;
    }

    /**
     * @param $email
     * @return bool
     */
    public static function isEmail($email)
    {
        $pattern = "/^[A-Za-z0-9\\x{4e00}-\\x{9fa5}]+@[a-zA-Z0-9_-]+(\\.[a-zA-Z0-9_-]+)+$/iu";
        if (is_string($email) && preg_match($pattern, $email)) {
            return true;
        }

        return false;
    }
}
