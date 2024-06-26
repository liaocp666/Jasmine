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
 * 获取主题版本号
 */
function getThemeVersion()
{
  $info = Plugin::parseInfo(Helper::options()->themeFile(Helper::options()->theme, "index.php"));
  return $info["version"];
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
