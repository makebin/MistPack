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
     * @author mark<mk9007@163.com>
     * @param String $str 
     * 
     * @static
     * 
     * @return String 
     */
    public static function placeholder(String $str) {
        if (empty($str) || mb_strlen($str) < 3) {
            return $str;
        }
        $_i = abs(mb_strlen($str) / 3);
        return substr_replace($str, str_repeat('*', $_i), $_i, $_i);
    }

}
