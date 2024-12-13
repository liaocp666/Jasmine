<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('template-parts/header.php');
?>
<?php $this->need('template-parts/Left.php'); ?>
<div class="col-md-12 col-lg-8" id="middle">
    <?php $this->need('template-parts/Navbar.php'); ?>
    <div class="container-fluid p-4 d-flex flex-column row-gap-3">
        <?php if ($this->fields->postType): ?>
            <?php if ('1' == $this->fields->postType): ?>
                <?php $this->need('template-parts/PostDefault.php') ?>
            <?php endif; ?>
            <?php if ('2' == $this->fields->postType): ?>
                <?php $this->need('template-parts/PostMoment.php') ?>
            <?php endif; ?>
        <?php else: ?>
            <?php $this->need('template-parts/PostDefault.php') ?>
        <?php endif; ?>
        <?php $this->need('template-parts/Comments.php'); ?>
    </div>
</div>
<?php $this->need('template-parts/Right.php'); ?>
<?php $this->need('template-parts/Footer.php'); ?>
