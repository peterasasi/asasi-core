<?php
namespace by\component\helper;


use by\component\string_extend\helper\StringHelper;
use by\infrastructure\helper\CallResultHelper;
use by\infrastructure\helper\DocParserHelper;
use by\infrastructure\helper\LangHelper;
use by\infrastructure\helper\Object2DataArrayHelper;
use by\infrastructure\interfaces\CheckInterfaces;

class ReflectionHelper
{

    private static $required = "_required";
    private static $regex = "_match_regex";

    /**
     *
     * 1. Support @ParameterName_required Comments
     *     Example @username_required  then username is required
     * 2. Implement CheckInterface
     * @param object $object
     * @param string $methodName
     * @param array $data value
     * @return \by\infrastructure\base\CallResult
     * @throws \ReflectionException
     */
    public static function invokeWithArgs($object, $methodName = 'index', $data = [])
    {
        $ref = new \ReflectionClass($object);
        try {
            $method = $ref->getMethod($methodName);
            if (!$method->isPublic()) {
                return CallResultHelper::fail(LangHelper::lang('cant access not public method'));
            }
            $params = $method->getParameters();
            $doc = $method->getDocComment();
            $docParams = DocParserHelper::parse($doc);
            $args = [];
            foreach ($params as $vo) {
                if ($vo instanceof \ReflectionParameter) {
                    $paramName = $vo->getName();
                    $cls = $vo->getClass();
                    $defaultValue = $vo->isDefaultValueAvailable() ? $vo->getDefaultValue() : null;

                    $underLineParamName = StringHelper::camelCaseToUnderline($paramName);

                    if ($cls) {
                        $clsName = $cls->getName();
                        $value = new $clsName;
                        Object2DataArrayHelper::setData($value, $data);
                        if ($value instanceof CheckInterfaces) {
                            $checkResult = ($value->check());
                            if (!$checkResult->isSuccess()) return $checkResult;
                        }
                    } elseif (array_key_exists($underLineParamName, $data)) {
                        // underline
                        $value = $data[$underLineParamName];
                    } elseif (array_key_exists($paramName, $data)) {
                        // origin name
                        $value = $data[$paramName];
                    } else {
                        $value = $defaultValue;
                    }


                    // regex test
                    $key = $underLineParamName . self::$regex;
                    if (array_key_exists($key, $docParams)) {
                        $regex = $docParams[$key];
                        if (is_array($regex)) {
                            foreach ($regex as $item) {
                                $item = trim($item);
                                list($reg, $msg) = self::splitRegex($item);
                                if (!preg_match($reg, $value)) {
                                    return CallResultHelper::fail(LangHelper::lang($msg));
                                }
                            }
                        } else {
                            $regex = trim($regex);
                            list($reg, $msg) = self::splitRegex($regex);
                            if (!preg_match($reg, $value)) {
                                return CallResultHelper::fail(LangHelper::lang($msg));
                            }
                        }
                    }


                    $key = $underLineParamName . self::$required;

                    if (array_key_exists($key, $docParams) && is_null($value)) {
                        $msg = $docParams[$key];

                        return CallResultHelper::fail(LangHelper::lang($msg), $data);
                    }

                    array_push($args, $value);
                }
            }

            $result = $method->invokeArgs($object, $args);
            return $result;

        } catch (\ReflectionException $exception) {
            return CallResultHelper::fail($exception->getMessage());
        }
    }

    public static function splitRegex($str)
    {
        $regex = "/reg:(.*)msg:(.*)/i";
        $matches = [];
        preg_match($regex, $str, $matches);
        if (count($matches) == 3) {
            array_shift($matches);
        }
        return $matches;
    }

}
