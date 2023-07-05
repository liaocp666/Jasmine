<?php

use Typecho\Plugin;
use Utils\Helper;
use Widget\Options;

if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
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
 * 获取左边栏菜单
 */
function getLeftSidebarMenu()
{
  return json_decode(getOptions()->leftSidebarMenu, true);
}

/**
 * 获取置顶文章
 */
function getStickyPost(): array
{
  $sticky_text = getOptions()->stickyPost;
  if (empty($sticky_text)) {
    return [];
  }
  $sticky_cids = explode("||", strtr($sticky_text, " ", ""));
  return $sticky_cids;
}

/**
 * 获取顶部分类
 * @return array
 */
function getMiddleTopCategoryIds(): array
{
  $middleTopCategoryIds = getOptions()->middleTopCategoryIds;
  return array_map("intval", explode("||", strtr($middleTopCategoryIds, " ", "")));
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
    $db
      ->select()
      ->from("table.fields")
      ->where("cid = ? and name = ?", $cid, $filedName)
  );
  return $field;
}

/**
 * 获取文章缩略图
 * @param $cid      文章 id
 * @return string   图片 url
 */
function getThumbnail($cid, $defaultThumbnail): string
{
  $filed = getFieldByCidAndName($cid, "thumbnail");
  if (empty($filed)) {
    return $defaultThumbnail;
  }
  $thumbnail = $filed[$filed["type"] . "_value"];
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
function getHumanizedDate(int $created)
{
  if (Helper::options()->timeFormat != "") {
    return date(Helper::options()->timeFormat, $created);
  } else {
    //计算时间差
    $diff = time() - $created;
    $d = floor($diff / 3600 / 24);

    $Y = date("Y", $created);

    //输出时间
    if (date("Y-m-d", $created) == date("Y-m-d")) {
      return "今天";
    } elseif ($d <= 1) {
      return "昨天";
    } elseif ($d == 2) {
      return "前天";
    } elseif ($d <= 31) {
      return $d . " 天前";
    } elseif ($Y == date("Y")) {
      return date("m-d", $created);
    } else {
      return date("Y-m-d", $created);
    }
  }
}

/**
 * 获取版权日期
 */
function getCopyrightDate(): string
{
  $text = "";
  if (!empty(getOptions()->startDate)) {
    $startDate = date_create(getOptions()->startDate);
    $text .= date_format($startDate, "Y");
    $text .= " - ";
  }
  $text .= date("Y", time());
  return $text;
}

/**
 * 获取评论头像
 * @param $mail 邮箱
 * @package $isOwner 是否为作者
 */
function getAvatarByMail($mail, $isOwner = false)
{
  if ($isOwner) {
    $authorAvatar = getOptions()->authorAvatar;
    if (!empty($authorAvatar)) {
      return $authorAvatar;
    }
  }
  $gravatarsUrl = "https://cravatar.cn/avatar/";
  $mailLower = strtolower($mail);
  $md5MailLower = md5($mailLower);
  $avatarWebsite = getOptions()->avatarWebsite;
  if (!isset($avatarWebsite) || $avatarWebsite == "gravatar") {
    return $gravatarsUrl . $md5MailLower . "?d=mm";
  }
  $qqMail = str_replace("@qq.com", "", $mailLower);
  if (strstr($mailLower, "qq.com") && is_numeric($qqMail) && strlen($qqMail) < 11 && strlen($qqMail) > 4) {
    return getQQAvatar($qqMail);
  } else {
    return $gravatarsUrl . $md5MailLower . "?d=mm";
  }
}

/**
 * 获取 QQ 头像
 */
function getQQAvatar($qq)
{
  $url = "https://s.p.qq.com/pub/get_face?img_type=3&uin=" . $qq;
  $response = get_headers($url, 1)["Location"];
  return str_replace("http://", "https://", $response);
}

/**
 * 获取主题版本号
 */
function getThemeVersion()
{
  $info = Plugin::parseInfo(Helper::options()->themeFile(Helper::options()->theme, "index.php"));
  return $info["version"];
}

/**
 * 处理正文
 * @param $content
 * @return array|string|string[]|null
 */
function handleContent($content)
{
  return imageLazyLoad($content);
}

/**
 * 图片懒加载
 * @param $content
 * @return array|string|string[]|null
 */
function imageLazyLoad($content)
{
  return preg_replace("/<img([^>]+)>/i", '<img$1 loading="lazy">', $content);
}

/**
 * 判断插件是否可用 add by Meteor
 *
 * @return bool
 */
function isPluginAvailable($name)
{
  $plugins = Typecho_Plugin::export();
  $plugins = $plugins["activated"];
  return is_array($plugins) && array_key_exists($name, $plugins);
}

/**
 * 获取选项值，无法获取则返回默认值数据
 * @param $name     选项名
 * @param $defaultValue 默认值
 */
function getOptionValueOrDefault($name, $defaultValue)
{
  return getOptions()->$name ? getOptions()->$name : $defaultValue;
}

/**
 * 查找数组选项值，无法获取则返回默认值
 * @param $optionName     名称
 * @param $searchName   数组名
 * @param $defaultValue 默认值
 */
function inArrayOptionValueOrDefault($optionName, $searchName, $defaultValue)
{
  if ($optionValue = getOptions()->$optionName) {
    return in_array($searchName, $optionValue);
  } else {
    return $defaultValue;
  }
}
