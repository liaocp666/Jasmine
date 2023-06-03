<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
    exit();
} ?>

<div id="header-menu" class="flex justify-between sticky top-0 border-b-2 border-stone-100 pt-5 pb-9 hidden lg:flex z-50 bg-[#ffffffe6] dark:bg-[#1b1d30cc] dark:text-neutral-300 dark:border-neutral-600">
    <ul class="nav flex items-center gap-x-3">
        <li>
            <a title="首页" href="<?php $this->options->siteUrl(); ?>"
               class="<?php if ($this->is("index")) {
                   echo "active";
               } ?> rounded-full px-4 py-2">首页</a>
        </li>
        <?php $this->widget("Jasmine_Meta_Row")->to($categorys); ?>
        <?php if ($categorys->have()): ?>
            <?php while ($categorys->next()): ?>
                <li>
                    <a href="<?php $categorys->permalink(); ?>"
                       title="<?php $categorys->name(); ?>"
                       class="<?php echo isActiveMenu(
                           $this,
                           $categorys->slug
                       ); ?> rounded-full px-4 py-2 hover:bg-black hover:text-white hover:shadow-lg">
                        <?php $categorys->name(); ?>
                    </a>
                </li>
            <?php endwhile; ?>
        <?php else: ?>
            <p>点击设置菜单“<a style="color: orange"
                               href="<?php echo $this->options->siteUrl(); ?>admin/options-theme.php">设置外观 ->
                    中间头部菜单</a>”</p>
        <?php endif; ?>
    </ul>
    <ul class="nav flex items-center gap-x-3">
        <li itemscope="" itemtype="https://schema.org/WebSite">
            <meta itemprop="url" content="https://www.liaocp.cn/">
            <form method="post" action="" id="search" itemprop="potentialAction" itemscope="" itemtype="https://schema.org/SearchAction">
                <meta itemprop="target" content="https://www.liaocp.cn/search/{s}/">
                <label for="search" class="flex flex-row">
                <button class="my-2 pt-2" onclick="jasmine.clickSearch()">
                    <iconify-icon icon="tabler:search"
                                class="rounded px-1 text-lg"></iconify-icon>
                </button>
                <input class="my-2 w-0 focus:w-32" itemprop="query-input" id="search-input" type="text" name="s" required="true" autocomplete="off" placeholder="Search">
                </label>
            </form>
        </li>
    </ul>
</div>

<div id="header-menu-mobile" class="lg:hidden flex justify-between sticky top-0 border-b-2 border-stone-100 py-3 z-50 bg-[#ffffffe6] dark:bg-[#1b1d30cc] dark:text-neutral-300 dark:border-neutral-600">
    <ul class="nav flex items-center gap-x-3">
        <li>
            <?php $this->need("component/logo.php"); ?>
        </li>
    </ul>
    <ul class="nav flex items-center gap-x-3">
        <li>
            <button>
                <iconify-icon icon="tabler:sun-moon"
                              class="rounded px-3 py-2 text-lg hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
            </button>
        </li>
        <li>
            <button>
                <iconify-icon icon="tabler:search"
                              class="rounded px-3 py-2 text-lg hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
            </button>
        </li>
        <li>
            <button>
                <iconify-icon icon="tabler:menu-2"
                              class="rounded px-3 py-2 text-lg hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
            </button>
        </li>
    </ul>
</div>
