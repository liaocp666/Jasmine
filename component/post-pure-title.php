<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<div class="mx-1 flex flex-col">
    <div></div>
    <div class="flex flex-row" itemscope itemtype="https://schema.org/NewsArticle">
        <div class="mr-3 flex flex-1 flex-col justify-center gap-y-3">
            <h1 class="text-2xl font-semibold jasmine-primary-color jasmine-letter-spacing" itemprop="headline">
                <?php $this->title(); ?>
            </h1>
        </div>
    </div>
</div>
