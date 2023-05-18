<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<div class="mx-1 flex flex-col gap-y-12 pb-12 border-b-2 border-stone-100">
    <div></div>
    <?php while ($this->next()): ?>
        <?php if (isShuoShuoType($this->cid)): ?>
            <?php $this->need('component/post-item-moment.php'); ?>
        <?php else: ?>
            <?php $this->need('component/post-item-default.php'); ?>
        <?php endif; ?>
    <?php endwhile; ?>
</div>
