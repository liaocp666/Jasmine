<?php use Widget\Contents\Page\Rows;

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

?>

<nav class="navbar navbar-expand-lg border-bottom py-0 fw-medium sticky-top navbar-background border-light-subtle bg-body bg-opacity-75">
    <div class="container-fluid p-lg-4 px-4 py-3" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <a class="navbar-brand d-block d-lg-none nav-link p-0 d-flex align-items-center justify-content-center column-gap-1"
           href="<?php $this->options->siteUrl(); ?>">
            <?php if ($this->options->logoUrl): ?>
                <img src="<?php $this->options->logoUrl(); ?>" alt="<?php $this->options->title(); ?>" width="42"
                     loading="lazy"
                     height="42"
                     class="d-inline-block align-text-top rounded"
                     itemscope itemtype="https://schema.org/ImageObject"
                />
            <?php endif; ?>
            <?php $this->options->title() ?>
            <meta itemprop="name" content="<?php $this->options->title() ?>">
            <meta itemprop="url" content="<?php $this->options->siteUrl(); ?>">
        </a>
        <div class="d-flex d-block d-lg-none">
            <a class="nav-link p-0 d-flex align-items-center justify-content-center" id="bd-theme"
               href="javascript:changeBsTheme()">
                <i class="ti ti-sun-moon px-3 py-1 rounded fs-5"></i>
            </a>
            <button class="navbar-toggler border-0 pe-0" type="button" data-bs-toggle="offcanvas" href="#mobile-navbar" role="button" aria-controls="mobile-navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse pt-3 pt-lg-0 overflow-x-auto" id="navbarNav">
            <ul class="navbar-nav column-gap-5 me-auto flex-lg-wrap flex-nowrap list-group-horizontal"
                id="navbarNavLeft">
                <li class="nav-item">
                    <a class="nav-link px-0 py-0 text-nowrap <?php echo $this->is('index') ? 'active' : '' ?>"
                       href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">
                        首页
                    </a>
                </li>
                <?php Widget\Metas\Category\Rows::alloc()->to($categoies); ?>
                <?php $index = 1; ?>
                <?php while ($categoies->next()): ?>
                    <?php if (0 == $categoies->parent && $index <= $this->options->categoryNum): ?>
                        <li class="nav-item">
                            <a class="nav-link px-0 py-0 text-nowrap <?php echo (!$this->is('index') && $categoies->slug == $this->archiveSlug) ? 'active' : '' ?> <?php echo postNavbarActive($this, $categoies->slug); ?>"
                               href="<?php $categoies->permalink(); ?>">
                                <?php $categoies->name(); ?>
                            </a>
                        </li>
                        <?php $index = $index + 1; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </ul>
            <ul class="nav column-gap-4 ms-auto d-none d-lg-block">
                <li class="nav-item">
                    <form method="post" class="d-flex text-body-secondary">
                        <a class="nav-link p-0 d-flex align-items-center justify-content-center px-2 py-2 rounded-circle" id="form-search-icon"
                           onclick="clickSearchIcon('search-input')" style="cursor: pointer;">
                            <i class="ti ti-search"></i>
                        </a>
                        <input type="text" name="s" class="text border-0 px-1 text-body-secondary"
                               placeholder="输入关键字搜索" autocomplete="off" id="search-input"/>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="offcanvas offcanvas-start w-75" tabindex="-1" id="mobile-navbar" aria-labelledby="mobile-navbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobile-navbarLabel">导航</h5>
        <button type="button" class="btn-close lh-sm" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="ti ti-x"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex flex-column row-gap-4 align-content-between justify-content-between h-100">
            <div class="d-flex flex-column row-gap-4 navbar-nav" itemtype="http://schema.org/SiteNavigationElement">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action <?php echo $this->is('index') ? 'active border-0' : '' ?>"
                       href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">
                        首页
                    </a>
                    <?php Widget\Metas\Category\Rows::alloc()->to($categoies); ?>
                    <?php $index = 1; ?>
                    <?php while ($categoies->next()): ?>
                        <?php if (0 == $categoies->parent && $index <= $this->options->categoryNum): ?>
                            <a class="list-group-item list-group-item-action <?php echo (!$this->is('index') && $categoies->slug == $this->archiveSlug) ? 'active border-0' : '' ?> <?php echo postNavbarActive($this, $categoies->slug); ?>"
                               href="<?php $categoies->permalink(); ?>" aria-label="<?php $categoies->name(); ?>">
                                <?php $categoies->name(); ?>
                            </a>
                            <?php $index = $index + 1; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
                <form method="post" class="d-flex column-gap-2 text-body-secondary w-100">
                    <input type="text" name="s" class="form-control " placeholder="输入关键字搜索" autocomplete="off">
                    <button class="btn" type="submit"><i class="ti ti-search"></i></button>
                </form>
            </div>
            <div class="d-flex column-gap-3 justify-content-between bg-secondary-subtle rounded py-2 px-3 flex-wrap">
                <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">
                    <i class="ti ti-home"></i>
                </a>
                <?php Rows::alloc()->to($pages); ?>
                <?php while ($pages->next()): ?>
                    <?php if ($pages->fields->showPage): ?>
                        <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>" aria-label="<?php $pages->title(); ?>">
                            <i class="ti ti-<?php $pages->fields->iconPage(); ?>"></i>
                        </a>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>