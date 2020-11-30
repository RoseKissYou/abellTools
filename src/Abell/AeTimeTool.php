<?php

namespace Abell;

/*
 * 各种处理图片资源类的小工具
 * */
class AeTimeTool
{
    /**
     * 获取今天的时间
     */
    public static function getTodayTime()
    {
        $start = strtotime(date("Y-m-d",time()));
        return [$start, $start + 86400 - 1];
    }

    /**
     * 获取今天初的时间
     */
    public static function getBeginTodayTime()
    {
        return mktime(0, 0, 0, (int) date('m'), (int) date('d'), (int) date('Y'));
    }

    /**
     * 获取本周初的时间
     */
    public static function getBeginWeekTime()
    {
        return mktime(0, 0, 0, (int) date("m"), (int) date("d") - (int) date("w") + 1, (int) date("Y"));

    }

    /**
     * 获取本月初的时间
     */
    public static function getBeginMonthTime()
    {
        return mktime(0, 0, 0, (int) date('m'), 1, (int) date('Y'));
    }

    /**
     * 获取昨天时间
     */
    public static function getYesterdayTime()
    {
        $start = \strtotime(date("Y-m-d",strtotime("-1 day")));  //昨天凌晨的时间
        $end = \strtotime(date("Y-m-d"));  //今天凌晨的时间
        return [$start,$end];
    }
}