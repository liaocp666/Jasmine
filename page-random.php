<?php
/**
 * 随机文章
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$this->widget('Widget_Post_Random', array())->to($random);
if ($random -> have()) {
    while($random->next()) {
         header("Location:" . $random->permalink);
    }
} else {
    header('Location:' . getOptions()->siteUrl);
}
?>
