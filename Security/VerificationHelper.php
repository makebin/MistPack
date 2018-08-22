<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MistPack\Security;

/**
 * 常用验证数据合法工具
 * @filename VerificationHelper.php 
 * @encoding UTF-8 
 * @author mark <mk9007@163.com>
 * @datetime 2018-8-22 14:30:35
 */
class VerificationHelper {

    /**
     * 验证手机号码
     * @param String $mobile
     * @return boolean
     */
    public static function isMobile($mobile) {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('/^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$/', $mobile) ? TRUE : FALSE;
    }

    /**
     * 验证固定电话
     * @param type $telphone
     */
    public static function isTelphone($telphone) {
        return preg_match("/^([0-9]{3,4}-)?[0-9]{7,8}$/", $telphone) ? TRUE : FALSE;
    }

    /**
     * 验证电子邮件
     * @param type $email
     */
    public static function isEmail($email) {
        return preg_match("/^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/", $email) ? TRUE : FALSE;
    }

    /**
     * 验证微信号
     * @param String $wechat
     */
    public static function isWechat($wechat) {
        return preg_match("/^[_a-zA-Z0-9]{5,19}+$/isu", $wechat) ? TRUE : FALSE;
    }

    /**
     * 判断是否为qq
     * @param String $qq
     * @return boolean
     */
    public static function isQQ($qq) {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match("/[1-9][0-9]{4,14}/", $qq) ? TRUE : FALSE;
    }

    /**
     * 验证是否为身份证号码
     * @param String $idCard
     * @return type
     */
    public static function isIdCard($idCard) {
        return preg_match('/^\d{15}$)|(^\d{17}([0-9]|X)$/isu', $idCard) ? TRUE : FALSE;
    }

    /**
     * 验证银行卡号
     * @param String $backCard
     */
    public static function isBackCard($backCard) {
        return preg_match('/^(\d{15}|\d{16}|\d{19})$/isu', $backCard) ? TRUE : FALSE;
    }

    /**
     * 验证特殊符号
     * @param String $subject
     */
    public static function isSpacial($subject) {
        return preg_match("/\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\/|\;|\\' | \`|\-|\=|\\\|\|/isu", $subject) ? TRUE : FALSE;
    }

    /**
     * 验证只包含中英文的名字
     * @param String $subject
     */
    public static function isNickname($subject) {
        return preg_match("/^[\x{4e00}-\x{9fa5}]{2,10}$|^[a-zA-Z\s]*[a-zA-Z\s]{2,20}$/isu", $subject) ? TRUE : FALSE;
    }

}
