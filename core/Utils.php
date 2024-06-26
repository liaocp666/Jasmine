<?php

use Typecho\Common;
use Typecho\Date;
use Typecho\Db;
use Typecho\I18n;
use Utils\Helper;

class Utils
{

    /**
     * 根据文章ID和字段名，获取文章对应的字段值
     * @param int $postId 文章ID
     * @param string $field 字段名
     * @return mixed|null   字段值，如果字段不存在则返回null
     * @throws Db\Exception
     */
    public static function getFieldByPostId($postId, $field)
    {
        $db = Db::get();
        $row = $db->fetchRow(
            $db->select()
                ->from("table.fields")
                ->where("cid = ? and name = ?", $postId, $field)
        );
        if ($row && isset($row['str_value'])) {
            return $row['str_value'];
        }
        return null;
    }

    /**
     * 转换时间戳为 xxx （秒||分钟||小时||天）前
     * @param int $timestamp 时间戳
     * @return string   时间
     */
    public static function convertTimestamp($timestamp)
    {
        return I18n::dateWord($timestamp, Date::time());
    }

    /**
     * 获取建站日期
     * @return string yyyy-yyyy
     */
    public static function getWebSiteStartDate()
    {
        $text = "";
        if (!empty(Helper::options()->startDate)) {
            $startDate = date_create(Helper::options()->startDate);
            $text .= date_format($startDate, "Y");
            $text .= " - ";
        }
        $text .= date("Y", time());
        return $text;
    }

    /**
     * 根据邮箱获取头像地址
     * @param string $email 邮箱地址
     * @param int $size 头像大小
     * @return string   地址
     */
    public static function getAvatarByMail($email, $size = 50)
    {
        return Common::gravatarUrl($email, $size, 'X', 'mm', Helper::options()->request->isSecure());
    }

    /**
     * 处理 html 内容
     * @param $html
     * @return array|string|string[]|null
     */
    public static function handlerHtml($html)
    {
        $html = self::addLazyLoadToImages($html);
        return $html;
    }

    /**
     * 给 html 中的 img 标签添加 lazy 属性
     * @param $html html 代码
     * @return array|string|string[]|null
     */
    public static function addLazyLoadToImages($html)
    {
        return preg_replace("/<img([^>]+)>/i", '<img$1 loading="lazy">', $html);
    }

    /**
     * 判断插件是否可用
     *
     * @return bool true|false
     */
    public static function isPluginAvailable($name)
    {
        $plugins = Typecho_Plugin::export();
        $plugins = $plugins["activated"];
        return is_array($plugins) && array_key_exists($name, $plugins);
    }

    /**
     * 获取主题设置内容
     * @param string $optionName 选项名
     * @return mixed|null
     */
    public static function getThemeOption($optionName)
    {
        return Helper::options()->$optionName;
    }

    /**
     * 返回当前菜单样式
     * @param \Widget\Archive $self
     * @param $slug 别名
     * @return string
     */
    public static function ifActiveMenuClass($self, $slug)
    {
        $activeMenuClass = "jasmine-primary-bg shadow-lg !text-white";
        if ($self->is("category") && $self->getArchiveSlug() === $slug) {
            return $activeMenuClass;
        }

        if ($self->is("post") && in_array($slug, array_column($self->categories, "slug"))) {
            return $activeMenuClass;
        }
        return "";
    }

}