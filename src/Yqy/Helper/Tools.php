<?php

namespace Yqy\Test;

if (! function_exists('issetNotEmpty')) {
    /**
     * 存在并且不为空
     *
     * @param mixed $value
     *
     * @return bool
     */
    function issetNotEmpty($value)
    {
        return (isset($value) && !empty($value));
    }
}

if (! function_exists('credentialsFilter')) {
    /**
     * 登录类型过滤
     *
     * @param string $value
     *
     * @return int
     */
    function credentialsFilter($value)
    {
        // 手机号码
        if (preg_match("/^1([3-9])\d{9}$/", $value)) {
            return 1;
        }
        // 邮件
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return 2;
        }

        return -1;
    }
}

if (! function_exists('strToArr')) {
    /**
     * 字符串转数组
     *
     * @param mixed $str  目标字符串
     * @param mixed $char  分割符号
     * @param mixed $strType  字符串类型
     *
     * @return array
     */
    function strToArr($str, $char, $strType = 'string') : array
    {
        if (empty($str)) return [];

        if (strpos($str, $char) === false) return [$str];

        $arr = explode($char, trim($str, $char));
        switch ($strType) {
            case 'int':
                $arr = array_filter($arr, function($v) {
                    return !empty(intval($v));
                });
                break;
            default :
                break;
        }
        return $arr;
    }
}

