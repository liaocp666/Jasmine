<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<div class="flex flex-row" itemscope itemtype="https://schema.org/NewsArticle">
    <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
        <h2 class="jasmine-link-color-hover text-black line-clamp-1 text-xl jasmine-letter-spacing dark:text-neutral-200" itemprop="headline">
            <a href="<?php $this->permalink(); ?>"
               title="<?php $this->title(); ?>"><?php $this->title(); ?></a>
        </h2>
        <p class="line-clamp-2 jasmine-letter-spacing dark:dark:text-gray-400 break-all" itemprop="abstract">
            <a href="<?php $this->permalink(); ?>"
               title="<?php $this->title(); ?>"><?php $this->excerpt(500, ""); ?></a>
        </p>
        <div class="dark:text-gray-400">
            <span class="jasmine-link-color"><?php $this->category("·", true, "无"); ?></span>
            <span> · <?php echo getHumanizedDate($this->created); ?></span>
            <?php if (getOptionValueOrDefault("enablePostViews", "0") === "1"): ?>
            <span> · <?php echo getPostviews($this); ?></span>
            <?php endif; ?>
        </div>
        <span class="hidden" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                <meta itemprop="url" content="<?php $this->author->permalink(); ?>"/>
                                <a itemprop="url" href="<?php $this->author->permalink(); ?>">
                                    <span itemprop="name"><?php $this->author->screenName(); ?></span>
                                </a>
                            </span>
    </div>
    <?php if ($thumbnail = getThumbnail($this->cid, "")): ?>
        <meta itemprop="image" content="<?php echo $thumbnail; ?>"/>
        <a href="<?php $this->permalink(); ?>" title="<?php $this->title(); ?>" class="sm:w-[160px] md:w-[170px]">
            <img src="<?php echo $thumbnail; ?>" alt="<?php $this->title(); ?>" width="130"
                 height="90"
                 class="h-[130px] md:w-[170px] rounded object-cover sm:w-[150px]" loading="lazy"/>
        </a>
    <?php endif; ?>
</div>