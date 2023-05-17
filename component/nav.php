<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<?php $menus = getLeftSidebarMenu(); ?>
<?php if (!empty($menus)): ?>
<div class="flex grow flex-col justify-between">
    <ul class="flex flex-col flex-wrap content-center gap-y-3">
        <?php foreach ($menus as $menu): ?>
            <li>
                <a href="<?php echo $menu["url"]; ?>" target="<?php echo $menu["newTab"]
  ? "_blank"
  : "_self"; ?>" title="<?php echo $menu["name"]; ?>">
                    <iconify-icon icon="<?php echo $menu["icon"]; ?>"
                                  class="rounded px-3 py-2 text-2xl hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
                </a>
            </li>
        <?php endforeach; ?>
        <?php else: ?>
            <p>点击设置菜单“<a style="color: orange"
                               href="<?php echo $this->options->siteUrl(); ?>admin/options-theme.php">设置外观
                    -> 左边栏菜单</a>”</p>
        <?php endif; ?>
    </ul>
    <ul class="flex flex-col flex-wrap content-center gap-y-2">
        <li>
            <a href="">
                <iconify-icon icon="tabler:sun-moon"
                              class="rounded px-2 py-1 text-2xl hover:bg-black hover:text-white"></iconify-icon>
            </a>
        </li>
        <li>
            <a href="">
                <iconify-icon icon="tabler:arrow-bar-to-up"
                              class="rounded px-2 py-1 text-2xl hover:bg-black hover:text-white"></iconify-icon>
            </a>
        </li>
    </ul>
</div>
