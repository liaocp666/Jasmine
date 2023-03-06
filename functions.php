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
    //评论回复楼层最高999层.这个正常设置最高只有7层
    Helper::options()->commentsMaxNestingLevels = 999;
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
    $banner = new Typecho_Widget_Helper_Form_Element_Text('thumbnail', NULL, NULL, _t('缩略图'), _t('输入一个图片 url，作为缩略图显示在文章列表，没有则不显示'));
    $layout->addItem($banner);
    $excerpt = new Typecho_Widget_Helper_Form_Element_Text('excerpt', NULL, NULL, _t('文章摘要'), _t('输入一段文本来自定义摘要。'));
    $layout->addItem($excerpt);
    $commentShow = new Typecho_Widget_Helper_Form_Element_Select('commentShow', array('0' => '显示', '1' => '隐藏'), '0', '是否显示评论列表');
    $layout->addItem($commentShow);
    $keyword = new Typecho_Widget_Helper_Form_Element_Textarea('keyword', NULL, NULL, _t('SEO 关键词'), _t('多个关键词用英文下逗号隔开'));
    $layout->addItem($keyword);
    $description = new Typecho_Widget_Helper_Form_Element_Textarea('description', NULL, NULL, _t('SEO 描述'), _t('简单一句话描述'));
    $layout->addItem($description);
}
