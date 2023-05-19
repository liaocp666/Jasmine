<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
    exit();
} ?>

<div class="flex flex-col gap-y-3" itemscope itemtype="https://schema.org/NewsArticle">
    <div class="flex flex-row gap-x-3 item-center">
        <img class="rounded object-cover w-[42px] h-[42px]" width="42" height="42"
             src="<?php echo getAvatarByMail($this->author->mail, true); ?>"
             alt="<?php $this->author->screenName(); ?>">
        <div class="flex flex-col justify-center">
            <span><?php $this->author->screenName(); ?></span>
            <span class="text-neutral-500 text-sm"><?php echo getHumanizedDate($this->created); ?></span>
        </div>
    </div>
    <div class="flex markdown-body !bg-stone-100 rounded p-5 relative" id="moment">
        <?php $this->content(); ?>
    </div>
</div>
