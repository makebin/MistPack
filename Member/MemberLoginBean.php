<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MistPack\Member;

/**
 * Description of MemberLoginBean
 * 用户登录常用bean
 * @filename MemberLoginBean.php 
 * @encoding UTF-8 
 * @author mark <mk9007@163.com>
 * @datetime 2017-8-5 16:40:55
 */
class MemberLoginBean {

    /**
     * 用户ID
     * @var Int 
     */
    private $userID = 0;

    /**
     * 登录客户端IP地址
     * @var Int
     */
    private $clientIP = 0;

    /**
     * 时间时间
     * @var Int 
     */
    private $eventTime = 0;

    /**
     * 用户登录校验令牌
     * @var String 
     */
    private $token = '';

    /**
     * 用户名
     * @var String
     */
    private $username = '';

    public function getUserID() {
        return $this->userID;
    }

    public function getClientIP() {
        return $this->clientIP;
    }

    public function getEventTime() {
        return $this->eventTime;
    }

    public function getToken() {
        return $this->token;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUserID(Int $userid) {
        $this->userid = $userid;
    }

    public function setClientIP(Int $clientIP) {
        $this->clientIP = $clientIP;
    }

    public function setEventTime(Int $eventTime) {
        $this->eventTime = $eventTime;
    }

    public function setToken(String $token) {
        $this->token = $token;
    }

    public function setUsername(String $username) {
        $this->username = $username;
    }

    /**
     * 返回用户的数据登录序列化数据
     * @access public
     * @author mark<mk9007@163.com>
     */
    public function memberSerialization() {
        return [
            'userID' => $this->userID,
            'username' => $this->username,
            'token' => $this->token,
            'clientIP' => $this->clientIP,
            'eventTime' => $this->eventTime
        ];
    }

    /**
     * 通过数据库信息返回信息的用户Bean信息
     * @access public
     * @static
     * @param array $userinfo
     * @author mark<mk9007@163.com>
     */
    public static function memberSerializationToBean(Array $userinfo) {
        $bean = new MemberLoginBean;
        return $bean;
    }

}
