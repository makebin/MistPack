<?php

/**
 * @abstract 数据处理之数组处理
 * @author mark<mk9007@163.com>
 * @version     1.0
 * @copyright Yooooooooooooooooooou
 */

namespace MistPack\Diction\Data\Mscorlib;

/**
 * Description of DateTime
 *
 * @author Administrator
 */
class ArrayMist {

    /**
     * @const 正向排序
     */
    const ORDER_BY_ASC = 'ASC';

    /**
     * @const 逆向排序
     */
    const ORDER_BY_DESC = 'DESC';

    /**
     * @const 自然排序
     */
    const ORDER_BY_NAT = 'NAT';

    /**
     * 对查询结果集进行排序,处理正常返回排序结果，失败或者错误返回空数组
     * @access public
     * @static
     * @param array $list 查询结果
     * @param String $field 排序的字段名
     * @param String $sortby 排序类型
     * @return array
     * @author mark<mk9007@163.com>
     */
    public static function arraySortBy(Array $list, String $field, String $sortby = ArrayMist::ORDER_BY_ASC) {
        try {
            $refer = $resultSet = [];
            foreach ($list as $i => $data) {
                $refer[$i] = &$data[$field];
            }
            switch ($sortby) {
                case ArrayMist::ORDER_BY_ASC: // 正向排序
                    asort($refer);
                    break;
                case ArrayMist::ORDER_BY_DESC:// 逆向排序
                    arsort($refer);
                    break;
                case ArrayMist::ORDER_BY_NAT: // 自然排序
                    natcasesort($refer);
                    break;
            }
            foreach ($refer as $key => $val) {
                $resultSet[] = &$list[$key];
            }
            return $resultSet;
        } catch (\Exception $ex) {
            
        }
        return [];
    }

    /**
     * 对结果集进行分割成文本
     * @access public
     * @static
     * @param array $list 结果集
     * @param String $glue 分隔符
     * @return string
     * @author mark<mk9007@163.com>
     */
    public static function Array2TextAreaLine(Array $list, String $glue = PHP_EOL) {
        if (empty($list)) {
            return '';
        }
        return explode($glue, $list);
    }

    /**
     * 对文本内容进行分割成数组
     * @access public
     * @static
     * @param String $str 文本内容
     * @param String $gule 分割符号
     * @return Array
     * @author mark<mk9007@163.com>
     */
    public static function TextAreaLine2Array(String $str, String $gule = PHP_EOL) {
        if (empty($str)) {
            return [];
        }
        $tempSet = $resultSet = [];
        $tempSet = explode($gule, $str);
        if (empty($tempSet)) {
            return [];
        }
        foreach ($tempSet as $key => $item) {
            if (!empty($item)) {
                $resultSet[] = &$tempSet[$key];
            }
        }
        return $resultSet;
    }

}
