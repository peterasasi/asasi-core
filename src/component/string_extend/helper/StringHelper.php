<?php

namespace by\component\string_extend\helper;

/**
 * Class StringHelper
 * @package by\component\string_extend\helper
 */
class StringHelper
{
    /**
     * only alphabet
     */
    const ALPHABET = 1;

    /**
     * alphabet + numbers
     */
    const ALPHABET_AND_NUMBERS = 2;

    /**
     * only numbers
     */
    const NUMBERS = 3;

    private static $alphaCodeSet = 'abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY';

    private static $codeSet = '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY';

    /**
     *
     * @var array
     */
    public static $char62 = [
        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
        'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
        'U', 'V', 'W', 'X', 'Y', 'Z',
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y', 'z'];

    public static $char36 = [
        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
        'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
        'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    public static $pow62 = [
        1,
        62,
        3844,
        238328,
        14776336,
        916132832,
        56800235584,
        3521614606208,
        218340105584896,
        13537086546263552,
        839299365868340224
    ];
    public static $pow36 = [
        1,
        36,
        1296,
        46656,
        1679616,
        60466176,
        2176782336,
        78364164096,
        2821109907456,
        101559956668416,
        3656158440062976,
    ];

    /**
     *
     * Value Must Smaller than IntMax
     * @param $c62
     * @return float|int
     */
    public static function char62ToInt($c62)
    {
        $len = strlen($c62);
        if ($len > 10) return -1;
        $num = 0;
        $cnt = 0;
        while ($cnt < $len) {
            $index = 0;
            $char = substr($c62, $cnt, 1);
            for ($i = 0; $i < 62; $i++) {
                if (self::$char62[$i] == $char) {
                    $index = $i + 1;
                    break;
                }
            }

            $num = $num + $index * self::$pow62[$len - $cnt - 1];
            $cnt++;
        }
        return $num;
    }

    /**
     * return string length less than ten else return -1
     * integer Max
     * http://www.php.net/manual/zh/language.types.integer.php
     * @param integer $n  0 < $n < IntMax
     * @return int|string
     */
    public static function intTo62($n)
    {
        if (strval($n) > strval(PHP_INT_MAX)) {
            return -1;
        }
        $n = intval($n);
        if ($n < 0) {
            return -1;
        }
        if ($n === 0) {
            return 0;
        }
        $char = '';
        do {
            $key = ($n - 1) % 62;
            $char = self::$char62[$key] . $char;
            $n = floor(($n - $key) / 62);
            if (strlen($char) > 10) return -1;
        } while ($n > 0);

        return $char;
    }


    /**
     * @param int $num > 0
     * @return int|string
     */
    public static function intTo36Hex($num)
    {
        $num = intval($num);
        if ($num <= 0)
            return 0;
        $char = '';
        do {
            $key = ($num - 1) % 36;
            $char = self::$char36[$key] . $char;
            $num = floor(($num - $key) / 36);
            if (strlen($char) > 10) return -1;
        } while ($num > 0);
        return $char;
    }

    /**
     *
     * @param $c36
     * @return float|int
     */
    public static function char36ToInt($c36)
    {
        $len = strlen($c36);
        if ($len > 10) return -1;
        $num = 0;
        $cnt = 0;
        while ($cnt < $len) {
            $index = 0;
            for ($i = 0; $i < 36; $i++) {
                if (self::$char36[$i] == substr($c36, $cnt, 1)) {
                    $index = $i;
                    break;
                }
            }
            $num = $num + ($index + 1) * self::$pow36[$len - $cnt - 1];
            $cnt++;
        }
        return $num;
    }

    /**
     * @param $str
     * @return string
     */
    public static function utf8ToGbk($str)
    {
        return iconv('utf-8', 'gbk', $str);
    }

    /**
     * @return string
     */
    public static function md5UniqueId()
    {
        return md5(uniqid());
    }

    /**
     * @param string $type  ALPHABET|ALPHABET_AND_NUMBERS|NUMBERS
     * @param int $length
     * @return int|string
     */
    public static function randStr($type, $length = 6)
    {
        if ($type == self::ALPHABET) {
            return self::randAlphabet($length);
        } elseif ($type == self::ALPHABET_AND_NUMBERS) {
            return self::randAlphabetAndNumbers($length);
        } elseif ($type == self::NUMBERS) {
            return self::randNumbers($length);
        }

        return "unknown type";
    }

    /**
     * @param $length
     * @return string
     */
    public static function randAlphabet($length)
    {
        if ($length < 0) $length = 1;
        if ($length > 64) $length = 64;
        $code = [];
        for ($i = 0; $i < $length; $i++) {
            $code[$i] = self::$alphaCodeSet[mt_rand(0, strlen(self::$alphaCodeSet) - 1)];
        }
        return implode("", $code);
    }

    // construct

    /**
     * @param $length
     * @return string
     */
    public static function randAlphabetAndNumbers($length)
    {
        if ($length < 0) $length = 1;
        if ($length > 64) $length = 64;
        $code = [];
        for ($i = 0; $i < $length; $i++) {
            $code[$i] = self::$codeSet[mt_rand(0, strlen(self::$codeSet) - 1)];
        }
        return implode("", $code);
    }

    /**
     * @param int $length
     * @return int
     */
    public static function randNumbers($length = 6)
    {
        if ($length < 0) $length = 1;
        if ($length > 8) $length = 8;
        $start = pow(10, $length - 1);
        return mt_rand($start, ($start * 10) - 1);
    }

    /**
     * @param $str
     * @return string
     */
    public static function toCamelCase($str)
    {
        $str = ucwords(str_replace('_', ' ', $str));
        $str = str_replace(' ', '', lcfirst($str));
        return $str;
    }

    /**
     * @param $camelCaseStr
     * @param string $separator
     * @return mixed|string
     * @internal param $str
     */
    public static function camelCaseToUnderline($camelCaseStr, $separator = '_')
    {
        $temp_array = array();
        for ($i = 0; $i < strlen($camelCaseStr); $i++) {
            $ascii_code = ord($camelCaseStr[$i]);
            if ($ascii_code >= 65 && $ascii_code <= 90) {
                $temp_array[] = $separator . chr($ascii_code + 32);
            } else {
                $temp_array[] = $camelCaseStr[$i];
            }
        }
        return implode('', $temp_array);
    }

    /**
     * @param $delimiter
     * @param $string
     * @param null $limit
     * @return array
     */
    public static function explode($delimiter, $string, $limit = null)
    {
        if (empty($string)) return [];
        return explode($delimiter, $string, $limit);
    }

    /**
     * @param string $str
     * @param int $firstLen
     * @param int $lastLen
     * @param int $replaceCount
     * @param string $replaceChar
     * @return string
     */
    public static function hideSensitive($str, $firstLen = 3, $lastLen = 4, $replaceCount = 4, $replaceChar = '*')
    {
        if (strlen($str) > $firstLen + $lastLen) {
            return substr($str, 0, $firstLen) . str_repeat($replaceChar, $replaceCount) . substr($str, -$lastLen);
        }
        return $str;
    }

    /**
     *
     *
     * @param float $number
     * @param int $decimal
     * @param string $dec_point
     * @param string $thousands_sep
     * @return string
     */
    public static function numberFormat($number, $decimal = 2, $dec_point = ".", $thousands_sep = "")
    {
        return number_format($number, $decimal, $dec_point, $thousands_sep);
    }

    /**
     *
     * @param $str
     * @param string $replace
     * @param array $extraChar
     * @return mixed
     */
    public static function filterPunctuation($str, $replace = '', $extraChar = [])
    {
        $default = array('）','（','￥','¥', ' ', '｛', '-', '—', '【', '】', '《', '》', '｝', '', '!', '"', '#', '$', '%', '&', '\'', '(', ')', '*',
            '+', ', ', '-', '.', '/', ':', ';', '<', '=', '>',
            '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|',
            '}', '~', '；', '﹔', '︰', '﹕', '：', '，', '﹐', '、',
            '．', '﹒', '˙', '·', '。', '？', '！', '～', '‥', '‧',
            '′', '〃', '〝', '〞', '‵', '‘', '’', '『', '』', '「',
            '」', '“', '”', '…', '❞', '❝', '﹁', '﹂', '﹃', '﹄');

        return str_replace(
            array_merge($default, $extraChar),
            $replace,
            $str);
    }
}
