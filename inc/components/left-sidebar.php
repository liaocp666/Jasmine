<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="col-1" id="left-sidebar-sticky">
    <div id="left-sidebar" class="pt-5 text-center d-flex flex-column justify-content-between position-relative">
        <div class="list">
            <div class="logo mb-5">
                <?php if ($this->options->logoUrl): ?>
                    <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>">
                        <img src="<?php echo $this->options->logoUrl;?>" alt="<?php $this->options->title() ?>" width="50" height="50">
                    </a>
                <?php endif; ?>
            </div>
            <div class="jasmine-nav">
                <ul class="nav flex-column align-content-center">
                    <?php if (!empty(getLeftSidebarMenu())): ?>
                        <?php foreach (getLeftSidebarMenu() as $menu): ?>
                            <li class="nav-item mb-3">
                                <a href="<?php echo $menu['url']; ?>"
                                   class="nav-link"
                                   target="<?php echo ($menu['newTab']) ? '_blank' : '_self' ?>"
                                   title="<?php echo $menu['name']; ?>"
                                   data-bs-toggle="tooltip"
                                   data-bs-title="<?php echo $menu['name']; ?>"
                                   data-bs-placement="right">
                                    <i class="<?php echo $menu['icon']; ?>"></i>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>点击设置菜单“<a style="color: orange" href="<?php echo $this->options->siteUrl(); ?>admin/options-theme.php">设置外观 -> 左边栏菜单</a>”</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="action">
            <ul class="nav flex-column align-content-center">
                <li class="nav-item mb-2">
                    <a href="javascript::darkmodeToggle()" class="nav-link" id="darkmode-button">
                        <i class="bi bi-moon-stars-fill"></i>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="" class="nav-link">
                        <i class="bi bi-arrow-up-circle-fill"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
