<?php
/**
 * Jasmine 主题
 *
 * @package Jasmine
 * @author Kent Liao
 * @version 1.0.0
 * @link https://www.sanji.one
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('template-parts/header.php');
?>
<?php $this->need('template-parts/left.php'); ?>
    <div class="col-md-12 col-lg-8" id="middle">
        <?php $this->need('template-parts/navbar.php'); ?>
        <div class="container-fluid p-4 d-flex flex-column row-gap-5">
            <h2 class="post-title">404 - <?php _e('页面没找到'); ?></h2>
            <p><?php _e('你想查看的页面已被转移或删除了, 要不要搜索看看: '); ?></p>
            <form method="post" class="d-flex column-gap-3">
                <input type="text" class="form-control" name="s" class="text" autofocus placeholder="输入关键字搜索"/>
                <input type="submit" class="btn btn-dark text-nowrap" value="<?php _e('搜索'); ?>">
            </form>
        </div>
    </div>
<?php $this->need('template-parts/right.php'); ?>
<?php $this->need('template-parts/footer.php'); ?>