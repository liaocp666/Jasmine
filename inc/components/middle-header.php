<div class="jasmine-navbar">
    <div class="row">
        <div class="col-9 d-none d-lg-block">
            <div class="menu">
                <ul class="nav nav-pills" id="jasmine-wrap">
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->is('index')) echo 'active' ?>" aria-current="page" href="<?php $this->options->siteUrl(); ?>" title="首页">首页</a>
                    </li>
                    <?php $this->widget('Jasmine_Meta_Row')->to($categorys); ?>
                    <?php if ($categorys->have()): ?>
                        <?php while($categorys->next()): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo isActiveMenu($this, $categorys->slug); ?>" aria-current="page" href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>点击设置菜单“<a style="color: orange" href="<?php echo $this->options->siteUrl(); ?>admin/options-theme.php">设置外观 -> 中间头部菜单</a>”</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="col-3 d-none d-lg-block">
            <div class="action float-end">
                <ul class="nav nav-pills">
                    <li class="nav-item d-flex" itemscope itemtype="https://schema.org/WebSite">
                        <meta itemprop="url" content="<?php $this->options->siteUrl(); ?>"/>
                        <form method="post" action="" id="search" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
                            <meta itemprop="target" content="<?php $this->options->siteUrl(); ?>search/{s}/"/>
                            <label for="search" class="d-flex">
                                <span class="me-1" title="搜索">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input itemprop="query-input" id="search-input" type="text" name="s" type="search" required="true" autocomplete="off" placeholder="Search"/>
                            </label>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 d-lg-none">
            <div class="d-flex justify-content-between">
                <div class="mobile-logo">
                    <?php if ($this->options->logoUrl): ?>
                        <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>">
                            <img src="<?php echo $this->options->logoUrl;?>" alt="<?php $this->options->title() ?>" width="30" height="30">
                        </a>
                    <?php endif; ?>
                </div>
                <div class="mobile-action d-flex">
                    <form method="post" action="" id="search-mobile">
                        <label for="search" class="d-flex">
                            <span class="me-1" title="搜索">
                                <i class="bi bi-search"></i>
                            </span>
                            <input id="search-input-mobile" type="text" name="s" type="search" required="true" autocomplete="off" placeholder="Search"/>
                        </label>
                    </form>
                    <span class="nav-link mx-3" id="mobile-darkmode-button">
                        <i class="bi bi-moon-stars"></i>
                    </span>
                    <span data-bs-toggle="offcanvas" data-bs-target="#mobileNavbar" aria-controls="mobileNavbar" role="button" aria-controls="mobileNavbar">
                        <i class="bi bi-layout-text-sidebar-reverse"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileNavbar" aria-labelledby="mobileNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group mb-5">
            <li class="list-group-item <?php if($this->is('index')) echo 'active' ?>">
                <a class="nav-link" aria-current="page" href="<?php $this->options->siteUrl(); ?>" title="首页">首页</a>
            </li>
            <?php $this->widget('Jasmine_Meta_Row')->to($categorys); ?>
            <?php if ($categorys->have()): ?>
                <?php while($categorys->next()): ?>
                    <li class="list-group-item <?php echo isActiveMenu($this, $categorys->slug); ?>">
                        <a class="nav-link" aria-current="page" href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <p>点击设置菜单“<a style="color: orange" href="<?php echo $this->options->siteUrl(); ?>admin/options-theme.php">设置外观 -> 中间头部菜单</a>”</p>
            <?php endif; ?>
        </ul>
        <ul class="list-group">
            <?php $menus = getLeftSidebarMenu(); ?>
            <?php if (!empty($menus)): ?>
            <?php foreach ($menus as $menu): ?>
                <li class="list-group-item">
                    <a class="nav-link" aria-current="page" href="<?php echo $menu['url']; ?>" title="<?php echo $menu['name']; ?>"><?php echo $menu['name']; ?></a>
                </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
