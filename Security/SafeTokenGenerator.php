<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MistPack\Security;

/**
 * 安全随即字符串生成器
 * Description of SafeTokenGenerator
 * @filename SafeTokenGenerator.php 
 * @encoding UTF-8 
 * @author mark <mk9007@163.com>
 * @datetime 2017-8-8 16:20:32
 */
class SafeTokenGenerator {

    /**
     * @var Int 
     */
    private $entropy;

    /**
     * @access public
     * @param Int $entropy 随机bytes长度
     * @author mark<mk9007@163.com>
     */
    public function __construct($entropy = 256) {
        $this->entropy = $entropy;
    }

    /**
     * @access public
     * @return String
     * @author mark<mk9007@163.com>
     */
    public function generateToken() {
        $bytes = random_bytes($this->entropy / 8);
        return rtrim(strtr(base64_encode($bytes), '+/', '-_'), '=');
    }

}
