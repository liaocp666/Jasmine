<?php
/**
 * <p>黑白之间，留白生诗。简至奢侈，静若自持。<p/>
 *
 * <a href="https://gitee.com/LiaoChunping/Jasmine/wikis/Home"target="_blank">文档</a> | <a href="https://gitee.com/LiaoChunping/Jasmine/repository/archive/main.zip"target="_blank">下载</a>
 * QQ   群：<a href="https://qm.qq.com/cgi-bin/qm/qr?k=oXM0EmLxXmgKfE1UDRlBY-g7Rkrx30oL&jump_from=webapi&authKey=uQdwWraveNKYBm/BQs88WXkNagEUr9tCkf/gbdQ9FasOviKYVhUd/wUME0q0AtnI" target="_blank">539165194</a>
 *
 *
 * @package Jasmine
 * @author Kent Liao
 * @version 3.1.0
 * @link https://www.liaocp.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('template-parts/header.php');
?>
<?php $this->need('template-parts/left.php'); ?>
    <div class="col-md-12 col-lg-8" id="middle">
        <?php $this->need('template-parts/navbar.php'); ?>
        <div class="container-fluid p-4 d-flex flex-column row-gap-4" id="index-content">
            <?php if ($this->have()): ?>
                <?php $this->need('template-parts/top-up-post.php') ?>
                <?php while ($this->next()): ?>
                    <?php if ($this->fields->postType): ?>
                        <?php if ('1' == $this->fields->postType): ?>
                            <?php $this->need('template-parts/index-default.php') ?>
                        <?php endif; ?>
                        <?php if ('2' == $this->fields->postType): ?>
                            <?php $this->need('template-parts/index-moment.php') ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php $this->need('template-parts/index-default.php') ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                <div class="col-12 d-flex justify-content-center align-items-center my-3" id="pagination">
                    <nav aria-label="Page navigation">
                        <?php $this->pageNav(_t('&laquo;'), _t('&raquo;'), 1, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination justify-content-center align-items-center column-gap-3 my-0', 'itemTag' => 'li')); ?>
                    </nav>
                </div>
            <?php else: ?>
                <h5 class="post-title"><?php _e('没有找到内容！'); ?></h5>
            <?php endif; ?>
        </div>
    </div>
<?php $this->need('template-parts/right.php'); ?>
<?php $this->need('template-parts/footer.php'); ?>