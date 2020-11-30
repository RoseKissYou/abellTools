<?php

namespace Abell;

/*
 * 各种处理数组的小工具
 * */
class AeArrayTool
{
    //递归实现侧边栏(层级从属关系)
    public static function getTree($data, $pid = 0, $level = 1)
    {
        $list = [];
        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level;
                $v['son'] = static::getTree($data, $v['id'], $level + 1);
                $list[] = $v;
            }
        }
        return $list;
    }

    // 当子集为空的时候不显示son字段
    public static function getTreeSon($data, $pid = 0, $level = 1)
    {
        $list = [];
        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level;
                $son_list = static::getTreeSon($data, $v['id'], $level + 1);
                if (count($son_list)) $v['son'] = $son_list;
                $list[] = $v;
            }
        }
        return $list;
    }


}