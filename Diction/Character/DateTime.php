<?php

/**
 * @abstract 日期处理相关类
 * @author mark<mk9007@163.com>
 * @version     1.0
 * @copyright Yooooooooooooooooooou
 */

namespace MistPack\Diction\Character;

/**
 * Description of DateTime
 *
 * @author Administrator
 */
class DateTime {

    const DATETIME_FORMAT_FULL = 'Y/h/d H:i:s';
    const DATETIME_FORMAT_Y_H_D = 'Y/h/d';
    const DATETIME_FORMAT_H_I_S = 'H:i:s';

    /**
     * 返回格式化后的时间
     * @static
     * @access public
     * @author mark<mk9007@163.com>
     * @param Integer $timestamp 时间戳
     * @param String $format 日期显示格式
     * @return String
     */
    public static function timeFormat(Int $timestamp = 0, $format = DateTime::DATETIME_FORMAT_FULL) {
        $timestamp = $timestamp == 0 ? time() : $timestamp;
        return date($format, $timestamp);
    }

}
