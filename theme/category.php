<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('template-parts/header.php');
?>
<?php $this->need('template-parts/left.php'); ?>
    <div class="col-md-12 col-lg-8" id="middle">
        <?php $this->need('template-parts/navbar.php'); ?>
        <div class="container-fluid p-4 d-flex flex-column row-gap-5">
            <?php $this->need('template-parts/category-sub.php'); ?>
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
        </div>
    </div>
<?php $this->need('template-parts/right.php'); ?>
<?php $this->need('template-parts/footer.php'); ?>