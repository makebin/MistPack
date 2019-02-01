<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MistPack\Drive;

/**
 * 容器工厂，保存对象到静态变量中，以供调用
 * Description of ContainerFactory
 * @filename ContainerFactory.php 
 * @encoding UTF-8 
 * @author mark <mk9007@163.com>
 * @datetime 2017-8-8 16:30:44
 */
class ContainerFactory {

	
    /**
     * 容器
     * @var Array
     */
    protected static $container = [];

    /**
     * 保存对象到容器中
     * @access public
     * @static
     * @param String $key 变量名
     * @param mixed $object  对象
     * @author mark<mk9007@163.com>
     */
    public static function attach(String $key, &$object) {
        self::$container[$key] = $object;
    }

    /**
     * 删除所有信息
     * @access public
     * @static
     * @author mark<mk9007@163.com>
     */
    public static function removeAll() {
        if (!empty(self::$container)) {
            foreach (self::$container as $key => &$value) {
                $value = null;
                unset(self::$container[$key]);
            }
            self::$container = [];
        }
    }

    /**
     * 判断对象是否存在
     * @access public
     * @static
     * @param String $key
     * @return Boolean
     * @author mark<mk9007@163.com>
     */
    public static function getHas(String $key) {
        return isset(self::$container[$key]) ? TRUE : FALSE;
    }

    /**
     * 删除对象
     * @access public
     * @static
     * @param String $key
     * @return boolean
     * @author mark<mk9007@163.com>
     */
    public static function remove(String $key) {
        if (self::getHas($key)) {
            self::$container[$key] = null;
            unset(self::$container[$key]);
            return TRUE;
        }
        return false;
    }

    /**
     * 获取对象
     * @access public
     * @static
     * @param String $key
     * @return mixed
     * @author mark<mk9007@163.com>
     */
    public static function &get(String $key) {
        return self::getHas($key) ? self::$container[$key] : FALSE;
    }

}
