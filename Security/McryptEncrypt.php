<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MistPack\Security;
/**
 * Description of McryptEncrypt
 * @filename McryptEncrypt.php 
 * @encoding UTF-8 
 * @author mark <mk9007@163.com>
 * @datetime 2017-7-27 14:13:26
 */
class McryptEncrypt {

    private $securityMethod = '';
    private $securityOption = OPENSSL_RAW_DATA;
    private $key = '';
    private $vi;

    
    /**
     * @access public
     * @param String $key 加密KEY
     * @param String $vi 初始化向量
     * @param  openssl_get_cipher_methods $mcMethod 加密方法,默认<b>aes-256-cbc</b>
     * @throws Exception
     * @author mark<mk9007@163.com>
     */
    public function __construct($key = '', $vi = '', $mcMethod = 'aes-256-cbc') {
        $this->securityMethod = $mcMethod;
        if (!in_array($this->securityMethod, openssl_get_cipher_methods())) {
            throw new Exception('securityMethod missing!');
        }
        $this->key = $key;
        $this->vi = $vi;
    }

    /**
     * @access public
     * @param String $plaintext
     * @return String
     * @author mark<mk9007@163.com>
     */
    public function securityEncode($plaintext) {
        return openssl_decrypt($plaintext, $this->securityMethod, $this->key, $this->securityOption, $this->vi);
    }

    /**
     * @access public
     * @param String $plaintext
     * @return String
     * @author mark<mk9007@163.com>
     */
    public function securityDecode($plaintext) {
        return openssl_encrypt($plaintext, $this->securityMethod, $this->key, $this->securityOption, $this->vi);
    }

}
