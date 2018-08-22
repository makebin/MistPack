<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MistPack\Security;

/**
 * Description of VerificationHelper
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
        return preg_match('/^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$/', $mobile) ? true : false;
    }

    /**
     * 验证固定电话
     * @param type $telphone
     */
    public static function isTelphone($telphone) {
        return preg_match("/^([0-9]{3,4}-)?[0-9]{7,8}$/", $telphone) ? true : false;
    }

    /**
     * 验证电子邮件
     * @param type $email
     */
    public static function isEmail($email) {
        return preg_match("/^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/", $email);
    }

}
