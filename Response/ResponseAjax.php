<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MistPack\Response;

use MistPack\Diction\Mscorlib\StringMist;

/**
 * ajax Response 
 * Description of ResponseAjax
 * @filename ResponseAjax.php 
 * @encoding UTF-8 
 * @author mark <mk9007@163.com>
 * @datetime 2017-8-7 15:55:05
 */
class ResponseAjax {

    /**
     * 成功状态
     */
    const STATE_SUCCESS = 'success';

    /**
     * 成功状态码
     */
    const STATE_SUCCESS_CODE = '100000';

    /**
     * 失败状态
     */
    const STATE_FAIL = 'fail';

    /**
     * 失败状态码
     */
    const STATE_FAIL_CODE = '-100000';

    /**
     * AJAX返回结构
     * @var Array 
     */
    private static $ajaxResult = array('state' => self::STATE_FAIL, 'msg' => '', 'data' => '', 'code' => self::STATE_FAIL_CODE);

    /**
     * 返回json字符串
     * @return String
     */
    public static function getAjaxResult() {
        return StringMist::simpleJsonEncode(self::$ajaxResult);
    }

    /**
     * 设置值内容
     * @access public
     * @static
     * @param String $key ajax值
     * @param mixed $values ajax内容
     * @author mark<mk9007@163.com>
     */
    public static function setAjaxResult($key, $values) {
        self::$ajaxResult[$key] = $values;
    }

    /**
     * 设置ajax的data内容
     * @access public
     * @static
     * @param mixed $value data内容
     * @author mark<mk9007@163.com>
     */
    public static function setAjaxResultData($value) {
        self::$ajaxResult['data'] = $value;
    }

    /**
     * 设置状态码
     * @access public
     * @static
     * @param Int $code 设置状态码
     * @author mark<mk9007@163.com>
     */
    public static function setAjaxResultCode($code = self::STATE_SUCCESS_CODE) {
        self::$ajaxResult['code'] = $code;
    }

    /**
     * 设置ajax状态值以及相提示信息
     * @access public
     * @static
     * @param String $msg 提示信息
     * @param String $state 设置状态值
     * @param int $code 设置状态码
     * @author mark<mk9007@163.com>
     */
    public static function setAjaxResultState($msg = '', $state = self::STATE_SUCCESS, $code = self::STATE_SUCCESS_CODE) {
        self::$ajaxResult['state'] = $state;
        self::$ajaxResult['msg'] = $msg;
        self::$ajaxResult['code'] = $code;
    }

    /**
     * 设置ajax提示信息
     * @access public
     * @static
     * @param String $msg 返回提示信息
     * @author mark<mk9007@163.com>
     */
    public static function setAjaxMessage($msg) {
        self::$ajaxResult['msg'] = $msg;
    }

}
