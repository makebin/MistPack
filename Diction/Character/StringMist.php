<?php

/**
 * @abstract 字符串文本处理类
 * @author mark<mk9007@163.com>
 * @version     1.0
 * @copyright Yooooooooooooooooooou
 */

namespace MistPack\Diction\Character;

class StringMist {

    /**
     * 对提供的文字内容进行占位符操作
     * 默认对系统中间的文字串进行占位符操作
     * @static
     * @access public
     * @author mark<mk9007@163.com>
     * @param String $str 
     * @return String 
     */
    public static function placeholder(String $str) {
        if (empty($str) || mb_strlen($str) < 3) {
            return $str;
        }
        $_i = abs(mb_strlen($str) / 3);
        return substr_replace($str, str_repeat('*', $_i), $_i, $_i);
    }

    /**
     * 字符串截取，支持中文和其他编码
     * @static
     * @access public
     * @param string $str 需要转换的字符串
     * @param Integer $length 截取长度
     * @param Integer $start 开始位置
     * @param string $charset 编码格式
     * @param Boolean $suffix 截断显示字符
     * @return string
     */
    public static function msubstr(String $str, Int $length, Int $start = 0, String $charset = "utf-8", Boolean $suffix = true) {
        if (function_exists("mb_substr")) {
            $slice = mb_substr($str, $start, $length, $charset);
        } elseif (function_exists('iconv_substr')) {
            $slice = iconv_substr($str, $start, $length, $charset);
            if (false === $slice) {
                $slice = '';
            }
        } else {
            $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            $match = [];
            preg_match_all($re[$charset], $str, $match);
            $slice = join("", array_slice($match[0], $start, $length));
        }
        return $suffix ? $slice . '...' : $slice;
    }

}
