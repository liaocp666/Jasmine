<?php

use Typecho\Common;
use Utils\Helper;
use Widget\Options;

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

require_once 'inc/core/index.php';

/**
 * 初始化主题
 * @param $archive
 * @return void
 */
function themeInit($archive)
{
    //暴力解决访问加密文章会被 pjax 刷新页面的问题
    if ($archive->hidden) header('HTTP/1.1 200 OK');
    //评论回复楼层最高999层.这个正常设置最高只有7层
    Helper::options()->commentsMaxNestingLevels = 999;
    //强制评论关闭反垃圾保护
    Helper::options()->commentsAntiSpam = true;
    //将最新的评论展示在前
    Helper::options()->commentsOrder = 'DESC';
    //关闭检查评论来源URL与文章链接是否一致判断
    Helper::options()->commentsCheckReferer = false;
    // 强制开启评论markdown
    Helper::options()->commentsMarkdown = '1';
    Helper::options()->commentsHTMLTagAllowed .= '<img class src alt><div class>';
}

/**
 * 文章与独立页自定义字段
 */
function themeFields(Typecho_Widget_Helper_Layout $layout)
{
    $banner = new Typecho_Widget_Helper_Form_Element_Text('banner', NULL, NULL, _t('缩略图'), _t('输入一个图片 url，作为缩略图显示在文章列表，没有则不显示'));
    $layout->addItem($banner);
    $excerpt = new Typecho_Widget_Helper_Form_Element_Text('excerpt', NULL, NULL, _t('文章摘要'), _t('输入一段文本来自定义摘要。'));
    $layout->addItem($excerpt);
    $commentShow = new Typecho_Widget_Helper_Form_Element_Select('commentShow', array('0' => '显示', '1' => '隐藏'), '0', '是否显示评论列表');
    $layout->addItem($commentShow);
}

/**
 * 获取左边栏菜单
 */
function getLeftSidebarMenu()
{
    return json_decode(getOptions()->leftSidebarMenu, true);
}

/**
 * 获取中间头部菜单
 */
function getMiddleTopMenu()
{
    return json_decode(getOptions()->middleTopMenu, true);
}

/**
 * 获取 Options
 * @return Options
 */
function getOptions(): Options
{
    return Helper::options();
}

function getDb()
{
    return Typecho_Db::get();
}

/**
 * 获取置顶文章
 */
function getStickyPost()
{
    $db = Typecho_Db::get();
    $sticky_text = getOptions()->stickyPost;
    $sticky_cids = explode('||', strtr($sticky_text, ' ', ''));
    $sticky_posts = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?', 'publish')
        ->where('type = ?', 'post')
        ->where('cid in ?', $sticky_cids)
        ->order('cid', Typecho_Db::SORT_ASC)
    );
    return $sticky_posts;
}

/**
 * 获取文章自定义字段
 * @param $cid            文章id
 * @param $filedNames     字段名
 */
function getFieldByCidAndName($cid, $filedName)
{
    $db = Typecho_Db::get();
    $field = $db->fetchRow(
        $db->select()->from('table.fields')
            ->where('cid = ? and name = ?', $cid, $filedName)
    );
    return $field;
}

/**
 * 获取摘要
 * @param $text         文本
 * @param $num          字数
 * @param $appendText   拼接内容
 * @return array|string|string[]|null
 */
function getExcerpt($text, $num, $appendText)
{
    $text = Common::subStr(strip_tags($text), 0, $num, $appendText);
    return $text;
}

/**
 * 获取文章缩略图
 * @param $cid      文章 id
 * @return string   图片 url
 */
function getThumbnail(string $cid, string $defaultThumbnail): string
{
    $filed = getFieldByCidAndName($cid, 'thumbnail');
    $thumbnail = $filed[$filed['type'] . '_value'];
    // 使用自定义字段，设置缩略图
    if (!empty($thumbnail)) {
        return $thumbnail;
    }
    return $defaultThumbnail;
}
