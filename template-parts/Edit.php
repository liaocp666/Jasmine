<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if($this->user->hasLogin()):?>
    &nbsp;·&nbsp;
    <?php if($this->is('post')): ?>
        <a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>">
            编辑
        </a>
    <?php endif; ?>
    <?php if($this->is('page')): ?>
        <a href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid;?>">
            编辑
        </a>
    <?php endif; ?>
<?php endif;?>
