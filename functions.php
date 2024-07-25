<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
}

use Typecho\Db;
use Typecho\Widget\Helper\Form\Element\Text;
use Typecho\Widget\Helper\Form\Element\Textarea;

error_reporting(E_ERROR);

require_once "core/index.php";

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
  Helper::options()->commentsOrder = "DESC";
  // 关闭检查评论来源URL与文章链接是否一致判断
  // Helper::options()->commentsCheckReferer = false;
  // 强制开启评论markdown
  // Helper::options()->commentsMarkdown = "1";
  // Helper::options()->commentsHTMLTagAllowed .= "<img class src alt><div class>";
  // if (getOptions()->pjaxLoadPage) {
  //   Helper::options()->commentsAntiSpam = false;
  // }
}

/**
 * 文章与独立页自定义字段
 */
function themeFields($layout)
{
  $banner = new Text(
    "thumbnail",
    null,
    null,
    _t("缩略图"),
    _t("输入一个图片 url，作为缩略图显示在文章列表，没有则不显示")
  );
  $layout->addItem($banner);
  $keyword = new Textarea(
    "keyword",
    null,
    null,
    _t("SEO 关键词"),
    _t("多个关键词用英文下逗号隔开")
  );
  $layout->addItem($keyword);
  $description = new Textarea(
    "description",
    null,
    null,
    _t("SEO 描述"),
    _t("简单一句话描述")
  );
  $layout->addItem($description);
  $view = new Text(
    "views",
    null,
    0,
    _t("浏览量"),
    _t("记录文章浏览次数")
  );
  $layout->addItem($view);
}

$custom_functions = __DIR__ . "/custom/functions.php";
if (file_exists($custom_functions)) {
  include_once $custom_functions;
}
