<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<div class="sidebar__right__inner flex flex-col px-5 gap-y-8">
    <div></div>
    <?php if (inArrayOptionValueOrDefault("sidebarRightWidget", "Author", true)): ?>
    <div class="flex flex-col gap-y-5 border-b border-stone-100 dark:border-neutral-600 pb-10">
        <div class="flex gap-x-3">
            <img src="<?php echo getAvatarByMail($this->author->mail, true); ?>"
                 loading="lazy"
                 alt="<?php $this->author->screenName(); ?>" width="50" height="50"
                 class="rounded object-cover">
            <div class="flex flex-col justify-between">
                <p class=" jasmine-primary-color"><?php $this->author->screenName(); ?></p>
                <p class="line-clamp-2  text-sm dark:text-gray-400"><?php $this->options->authorRecommend(); ?></p>
            </div>
        </div>
        <?php if ($authorTag = $this->options->authorTag): ?>
            <ul class="flex flex-wrap gap-x-2 gap-y-2">
                <?php foreach (explode(",", $authorTag) as $tag): ?>
                <li class="bg-stone-200 rounded py-1 px-2  text-sm dark:bg-black dark:text-neutral-400"><?php echo $tag; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <?php if (inArrayOptionValueOrDefault("sidebarRightWidget", "PopularArticles", true)): ?>
      <div class="flex flex-col justify-start gap-x-3 border-b border-stone-100 dark:border-neutral-600 gap-y-4 pb-12 mt-4">
          <div class="flex flex-row items-center  jasmine-primary-color">
              <iconify-icon icon="tabler:chart-bar" class="rounded pr-1 text-xl font-medium"></iconify-icon>
              <span class="font-medium">热门文章</span>
          </div>
          <ul class="flex flex-col gap-y-3 px-1">
              <?php $posts = getHotPosts(); ?>
              <?php if (!empty($posts)): ?>
                  <?php foreach ($posts as $post): ?>
                      <li>
                          <a href="<?php echo $post["permalink"]; ?>"
                             class="line-clamp-2  text-sm dark:text-gray-400 jasmine-link-color-hover text-neutral-500"
                             title="<?php echo $post["title"]; ?>"><?php echo $post["title"]; ?></a>
                      </li>
                  <?php endforeach; ?>
              <?php endif; ?>
          </ul>
      </div>
    <?php endif; ?>
    <?php if (inArrayOptionValueOrDefault("sidebarRightWidget", "LatestComments", true)): ?>
    <div class="flex flex-col justify-start gap-x-3 border-b border-stone-100 dark:border-neutral-600 gap-y-4 pb-12 mt-4">
        <div class="flex flex-row items-center  jasmine-primary-color">
            <iconify-icon icon="tabler:message" class="rounded pr-1 text-xl font-medium"></iconify-icon>
            <span class="font-medium">最新评论</span>
        </div>
        <ul class="flex flex-col gap-y-3 px-1">
            <?php $this->widget("Widget_Comments_Recent", [])->to($newComments); ?>
            <?php if ($newComments->have()): ?>
                <?php while ($newComments->next()): ?>
                    <li>
                        <a href="<?php $newComments->permalink(); ?>"
                           title="<?php $newComments->excerpt(35, "..."); ?>"
                           class="line-clamp-2  text-sm dark:text-gray-400 jasmine-link-color-hover text-neutral-500">
                            <?php echo $newComments->author; ?>: <?php $newComments->excerpt(35, "..."); ?></a>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
    <?php endif; ?>
    <?php if (inArrayOptionValueOrDefault("sidebarRightWidget", "PopularCategories", false)): ?>
    <div class="flex flex-col justify-start gap-x-3 border-b border-stone-100 dark:border-neutral-600 gap-y-4 pb-12 mt-4">
        <div class="flex flex-row items-center  jasmine-primary-color">
            <iconify-icon icon="tabler:briefcase" class="rounded pr-1 text-xl font-medium"></iconify-icon>
            <span class="font-medium">热门分类</span>
        </div>
        <ul class="flex flex-wrap gap-y-2">
            <?php $this->widget("Widget_Metas_Category_List", "ignoreZeroCount=1&limit=15")->to($categories); ?>
            <?php if ($categories->have()): ?>
                <?php while ($categories->next()): ?>
                    <li>
                        <a href="<?php $categories->permalink(); ?>"
                            title="<?php $categories->name(); ?>"
                            class=" dark:text-gray-400 text-sm rounded-full px-3 py-1 jasmine-primary-bg-hover hover:text-white"><?php $categories->name(); ?></a>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
    <?php endif; ?>
    <?php if (inArrayOptionValueOrDefault("sidebarRightWidget", "PopularTags", true)): ?>
      <div class="flex flex-col justify-start gap-x-3 border-b border-stone-100 dark:border-neutral-600 gap-y-4 pb-12 mt-4">
          <div class="flex flex-row items-center  jasmine-primary-color">
              <iconify-icon icon="tabler:bookmarks" class="rounded pr-1 text-xl font-medium"></iconify-icon>
              <span class="font-medium">热门标签</span>
          </div>
          <ul class="flex flex-wrap gap-y-2">
              <?php $this->widget("Widget_Metas_Tag_Cloud", "ignoreZeroCount=1&limit=15")->to($tags); ?>
              <?php if ($tags->have()): ?>
                  <?php while ($tags->next()): ?>
                      <li>
                          <a href="<?php $tags->permalink(); ?>"
                             title="<?php $tags->name(); ?>"
                             class=" dark:text-gray-400 text-sm rounded-full px-3 py-1 jasmine-primary-bg-hover hover:text-white"><?php $tags->name(); ?></a>
                      </li>
                  <?php endwhile; ?>
              <?php endif; ?>
          </ul>
      </div>
    <?php endif; ?>
    <?php if (inArrayOptionValueOrDefault("sidebarRightWidget", "About", true)): ?>
    <div class="flex flex-col justify-start gap-x-3 gap-y-4 pb-12 mt-4">
        <div class="flex flex-row items-center  jasmine-primary-color">
            <iconify-icon icon="tabler:chart-arcs" class="rounded pr-1 text-xl font-medium"></iconify-icon>
            <span class="font-medium">关于站长</span>
        </div>
        <ul class="flex flex-col gap-y-3  px-1  dark:text-gray-400">
            <?php if ($this->options->wx): ?>
                <li class="flex flex-row items-center gap-x-2">
                    <iconify-icon icon="tabler:brand-wechat" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                    <span class="text-sm "><?php $this->options->wx(); ?></span>
                </li>
            <?php endif; ?>
            <?php if ($this->options->qq): ?>
                <li class="flex flex-row items-center gap-x-2">
                    <iconify-icon icon="tabler:brand-qq" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                    <span class="text-sm "><?php $this->options->qq(); ?></span>
                </li>
            <?php endif; ?>
            <?php if ($this->options->location): ?>
                <li class="flex flex-row items-center gap-x-2">
                    <iconify-icon icon="tabler:map-pin" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                    <span class="text-sm "><?php $this->options->location(); ?></span>
                </li>
            <?php endif; ?>
            <?php if ($this->options->email): ?>
                <li class="flex flex-row items-center gap-x-2">
                    <iconify-icon icon="tabler:mail" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                    <span class="text-sm "><?php $this->options->email(); ?></span>
                </li>
            <?php endif; ?>
            <?php if ($this->options->career): ?>
                <li class="flex flex-row items-center gap-x-2">
                    <iconify-icon icon="tabler:briefcase" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                    <span class="text-sm "><?php $this->options->career(); ?></span>
                </li>
            <?php endif; ?>
            <?php if ($this->options->github): ?>
                <li class="flex flex-row items-center gap-x-2">
                    <iconify-icon icon="tabler:brand-github" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                    <span class="text-sm "><?php $this->options->github(); ?></span>
                </li>
            <?php endif; ?>
            <?php if ($this->options->link): ?>
                <li class="flex flex-row items-center gap-x-2">
                    <iconify-icon icon="tabler:link" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                    <span class="text-sm "><?php $this->options->link(); ?></span>
                </li>
            <?php endif; ?>
            <?php if ($this->options->cc): ?>
                <li class="flex flex-row items-center gap-x-2">
                    <iconify-icon icon="tabler:badge-cc" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                    <span class="text-sm "><?php $this->options->cc(); ?></span>
                </li>
            <?php endif; ?>
            <?php if ($this->options->icpCode): ?>
                <li class="flex flex-row items-center gap-x-2">
                    <iconify-icon icon="tabler:id-badge-2" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                    <span class="text-sm "><?php $this->options->icpCode(); ?></span>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <?php endif; ?>
</div>
