<?php

use Typecho\Common;
use Typecho\Db;
use Utils\Helper;
use Widget\Metas\Category\Rows;
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
function getStickyPost(): array
{
    $sticky_text = getOptions()->stickyPost;
    $sticky_cids = explode('||', strtr($sticky_text, ' ', ''));
    return $sticky_cids;
}

function getMiddleTopCategoryIds(): array
{
    $middleTopCategoryIds = getOptions()->middleTopCategoryIds;
    return array_map('intval', explode('||', strtr($middleTopCategoryIds, ' ', '')));
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

/**
 * 人性化日期
 * @param $created 日期
 * @return string   xx 前
 */
function humanizedDate(int $created)
{
    if (Helper::options()->timeFormat != '') {
        return date(Helper::options()->timeFormat, $created);
    } else {
        //计算时间差
        $diff = time() - $created;
        $d = floor($diff / 3600 / 24);

        $Y = date('Y', $created);

        //输出时间
        if (date('Y-m-d', $created) == date('Y-m-d')) {
            return '今天';
        } elseif ($d == 1) {
            return '昨天';
        } elseif ($d == 2) {
            return '前天';
        } elseif ($d <= 31) {
            return $d . ' 天前';
        } elseif ($Y == date('Y')) {
            return date('m-d', $created);
        } else {
            return date('Y-m-d', $created);
        }
    }
}

/**
 * 获取热门文章
 * @param $limit    页数
 * @param $order    排序
 */
function hotPosts($limit = 7, $order = 'created')
{
    $db = Typecho_Db::get();
    $options = Helper::options();
    $posts = $db->fetchAll($db->select()->from('table.contents')
        ->where('type = ? AND status = ? AND created < ?', 'post', 'publish', $options->time)
        ->order($order, Typecho_Db::SORT_DESC)
        ->limit($limit), array(Typecho_Widget::widget('Widget_Abstract_Contents'), 'filter'));
    return $posts;
}

class Widget_Comments_Recent extends Widget_Abstract_Comments
{
    public function __construct($request, $response, $params = NULL)
    {
        parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('pageSize' => 7, 'parentId' => 0));
    }

    public function execute()
    {
        $select = $this->select()->limit($this->parameter->pageSize)
            ->where('table.comments.status = ?', 'approved')
            ->order('table.comments.coid', Typecho_Db::SORT_DESC);
        if ($this->parameter->parentId) {
            $select->where('cid = ?', $this->parameter->parentId);
        }
        if ($this->options->commentsShowCommentOnly) {
            $select->where('type = ?', 'comment');
        }
        $select->where('ownerId <> authorId');
        $this->db->fetchAll($select, array($this, 'push'));
    }
}

/**
 * 获取版权日期
 */
function getCopyrightDate(): string
{
    $text = '';
    if (!empty(getOptions()->startDate)) {
        $startDate = date_create(getOptions()->startDate);
        $text .= date_format($startDate, 'Y');
        $text .= " - ";
    }
    $text .= date('Y', time());
    return $text;
}

class Jasmine_Meta_Row extends Rows
{

    public function __construct($request, $response, $params = NULL)
    {
        parent::__construct($request, $response, $params);
    }

    /**
     * 执行函数
     *
     * @throws Db\Exception
     */
    public function execute()
    {
        $this->stack = $this->getCategories(getMiddleTopCategoryIds());
    }
}

/**
 * 判断当前是菜单否激活
 * @param $self
 * @return string
 */
function isActiveMenu($self): string
{
    if ($self->is('index')) {
        return 'active';
    }
    return '';
}
