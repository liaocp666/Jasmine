<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="col-lg-3 sticky-bottom d-none d-lg-block border-start border-light-subtle" id="right">
    <div class="container-fluid p-4 border-bottom border-light-subtle">
        <div class="row gap-2">
            <div class="col-12">
                <p class="text-body-secondary text-truncate mb-0 fs-6 py-1">
                    <?php $this->options->description(); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="sticky-top">
        <?php $this->need('template-parts/right-hot-post.php'); ?>
        <?php $this->need('template-parts/right-latest-comment.php'); ?>
        <?php if($this->is('post')): ?>
            <?php if ($this->fields->postType): ?>
                <?php if ('1' == $this->fields->postType): ?>
                    <?php $this->need('template-parts/right-related-post.php'); ?>
                <?php endif; ?>
            <?php else: ?>
                <?php $this->need('template-parts/right-related-post.php'); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php $this->need('template-parts/right-hot-tag.php'); ?>
        <?php $this->need('template-parts/right-link.php'); ?>
    </div>
</div>
