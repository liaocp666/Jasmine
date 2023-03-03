<?php

use Typecho\Plugin;
use Utils\Helper;

/**
 * 获取主题版本号
 */
function getThemeVersion()
{
    $info = Plugin::parseInfo(Helper::options()->themeFile(Helper::options()->theme, 'index.php'));
    return $info['version'];
}
