<?php

namespace MistPack\Diction\Character;

/**
 *
 * 文字处理类
 * @author mark<mk9007@163.com>
 */
class StringMist {

    /**
     * 对提供的文字内容进行占位符操作
     * 默认对系统中间的文字串进行占位符操作
     * @author mark<mk9007@163.com>
     * @param String $str 
     * @return String 
     */
    public static function placeholder($str) {
        if (empty($str) || mb_strlen($str) < 3) {
            return $str;
        }
        $_i = abs(mb_strlen($str) / 3);
        return substr_replace($str, str_repeat('*', $_i), $_i, $_i);
    }

}
