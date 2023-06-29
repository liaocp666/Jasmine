<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<div class="flex flex-col gap-y-3" itemscope itemtype="https://schema.org/NewsArticle">
    <div class="flex flex-row gap-x-3 item-center">
        <img class="rounded object-cover w-[42px] h-[42px]" width="42" height="42"
             src="<?php echo getAvatarByMail($this->author->mail, true); ?>"
             loading="lazy"
             alt="<?php $this->author->screenName(); ?>">
        <div class="flex flex-col justify-center">
            <span class=""><?php $this->author->screenName(); ?></span>
            <span class=" text-sm"><?php echo getHumanizedDate($this->created); ?></span>
        </div>
    </div>
    <div class="markdown-body !bg-stone-100 rounded p-5 relative dark:!bg-[#0d1117] !text-neutral-900 dark:!text-neutral-200" id="moment">
        <?php echo handleContent($this->content); ?>
    </div>
</div>
