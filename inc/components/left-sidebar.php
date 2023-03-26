<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="col-lg-1 d-none d-lg-block" id="left-sidebar-sticky">
    <div id="left-sidebar" class="pt-5 text-center d-flex flex-column justify-content-between position-relative">
        <div class="list">
            <div class="logo mb-5" itemscope itemtype="https://schema.org/Organization">
                <?php if ($this->options->logoUrl): ?>
                    <a itemprop="url" href="<?php $this->options->siteUrl(); ?>"
                       title="<?php $this->options->title() ?>"
                       data-bs-toggle="tooltip"
                       data-bs-title="<?php $this->options->title() ?>"
                       data-bs-placement="right">
                        <img itemprop="logo"
                             src="<?php echo $this->options->logoUrl; ?>"
                             alt="<?php $this->options->title() ?>" width="50" height="50">
                    </a>
                <?php endif; ?>
                <?php if ($this->is('index')): ?>
                    <div class="d-none">
                        <h1><?php $this->options->title(); ?></h1>
                        <p><?php $this->options->description(); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="jasmine-nav">
                <ul class="nav flex-column align-content-center">
                    <?php $menus = getLeftSidebarMenu(); ?>
                    <?php if (!empty($menus)): ?>
                        <?php foreach ($menus as $menu): ?>
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
                        <p>点击设置菜单“<a style="color: orange"
                                           href="<?php echo $this->options->siteUrl(); ?>admin/options-theme.php">设置外观
                                -> 左边栏菜单</a>”</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="action">
            <ul class="nav flex-column align-content-center">
                <li class="nav-item mb-2">
                    <span role="button" class="nav-link" id="darkmode-button"
                       data-bs-toggle="tooltip"
                       data-bs-title="切换主题"
                       data-bs-placement="right"
                       title="切换主题"
                    >
                        <i class="bi bi-moon-stars-fill"></i>
                    </span>
                </li>
                <li class="nav-item mb-2">
                    <span role="button" class="nav-link" id="backToTop"
                       data-bs-toggle="tooltip"
                       data-bs-title="返回顶部"
                       data-bs-placement="right"
                       title="返回顶部"><i class="bi bi-arrow-up-circle-fill"></i>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>
