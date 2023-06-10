<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<?php $menus = getLeftSidebarMenu(); ?>
<div class="flex grow flex-col justify-between">
    <ul class="flex flex-col flex-wrap content-center gap-y-3 " id="nav">
        <?php if (!empty($menus)): ?>
        <?php foreach ($menus as $menu): ?>
            <li class="relative nav-li">
                <a href="<?php echo $menu["url"]; ?>" target="<?php echo $menu["newTab"]
  ? "_blank"
  : "_self"; ?>" title="<?php echo $menu["name"]; ?>">
                    <iconify-icon icon="<?php echo $menu["icon"]; ?>"
                                  class="rounded px-3 py-2 text-2xl jasmine-primary-bg-hover hover:text-white hover:shadow-lg"></iconify-icon>
                </a>
                <span class="jasmine-primary-bg text-white px-2 py-1 absolute w-full rounded top-[5px] left-[60px] w-max z-50"
                      style="display: none">
                    <?php echo $menu["name"]; ?>
                </span>
            </li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <ul class="flex flex-col flex-wrap content-center gap-y-2 ">
        <li class="relative nav-li">
            <button onclick="jasmine.switchDark()">
                <iconify-icon icon="<?php echo getOptionValueOrDefault("switchDarkIconPhone", "tabler:sun-moon"); ?>"
                              class="rounded px-2 py-1 text-2xl jasmine-primary-bg-hover hover:text-white"></iconify-icon>
            </button>
            <span class="jasmine-primary-bg text-white px-2 py-1 absolute w-full rounded top-0 left-[53px] w-max z-50"
                  style="display: none">
                    切换模式
                </span>
        </li>
        <li class="relative nav-li">
            <button onclick="jasmine.backtop()">
                <iconify-icon icon="tabler:arrow-bar-to-up"
                              class="rounded px-2 py-1 text-2xl jasmine-primary-bg-hover hover:text-white"></iconify-icon>
            </button>
            <span class="jasmine-primary-bg text-white px-2 py-1 absolute w-full rounded top-0 left-[53px] w-max z-50" style="display: none">
                    返回顶部
                </span>
        </li>
    </ul>
</div>
