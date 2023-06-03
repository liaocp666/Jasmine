<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
    exit();
} ?>

<div id="header-menu" class="sticky top-0 border-b border-stone-100 lg:py-5 bg-[#ffffffe6] dark:bg-[#1b1d30cc] z-[999] dark:border-neutral-600">
    <div id="header-menu-wrap" class="flex justify-between hidden lg:flex z-50 dark:text-neutral-300">
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
                    <input class="my-2 w-0 focus:w-32 bg-transparent" itemprop="query-input" id="search-input" type="text" name="s" required="true" autocomplete="off" placeholder="Search">
                    </label>
                </form>
            </li>
        </ul>
    </div>  
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
            <button onclick="jasmine.toggleMobileMenu()">
                <iconify-icon icon="tabler:menu-2"
                              class="rounded px-3 py-2 text-lg hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
            </button>
        </li>
    </ul>
</div>

<div id="mobile-menus-bg" class="lg:hidden fixed top-0 left-0 z-[999] bg-gray-500/50 w-full min-h-screen translate-x-[1000px]"></div>
<div id="mobile-menus" class="lg:hidden fixed top-0 left-0 z-[1000] translate-x-[1000px] w-4/5">
    <div class="bg-stone-100 min-h-screen flex flex-col gap-y-14 px-5 pt-14">
        <ul class="flex flex-col items-center gap-y-3">
            <li class="bg-white rounded w-full">
                <a title="首页" href="<?php $this->options->siteUrl(); ?>"
                class="w-full block px-4 py-2">首页</a>
            </li>
            <?php $this->widget("Jasmine_Meta_Row")->to($categorys); ?>
            <?php if ($categorys->have()): ?>
                <?php while ($categorys->next()): ?>
                    <li class="bg-white rounded w-full">
                        <a href="<?php $categorys->permalink(); ?>"
                        title="<?php $categorys->name(); ?>"
                        class="w-full block px-4 py-2">
                            <?php $categorys->name(); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
        <ul class="flex flex-col items-center gap-y-3 w-full">
            <?php $menus = getLeftSidebarMenu(); ?>
            <?php if (!empty($menus)): ?>
                <?php foreach ($menus as $menu): ?>
                    <li class="bg-white rounded w-full">
                        <a class="w-full block px-4 py-2" href="<?php echo $menu["url"]; ?>" target="<?php echo $menu["newTab"]
                            ? "_blank"
                            : "_self"; ?>" title="<?php echo $menu["name"]; ?>">
                            <?php echo $menu["name"]; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>