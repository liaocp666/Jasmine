<?php

use Utils\Helper;

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
 * 获取左边栏菜单
 */
function getLeftSidebarMenu()
{
    return json_decode(getOptions()->leftSidebarMenu, true);
}

/**
 * 获取中间头部菜单
 */
function getMiddleTopMenu() {
    return json_decode(getOptions()->middleTopMenu, true);
}

/**
 * 获取 Options
 * @return \Widget\Options
 */
function getOptions(): \Widget\Options
{
    return Helper::options();
}
