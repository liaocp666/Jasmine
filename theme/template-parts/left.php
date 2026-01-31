<?php

use Widget\Contents\Page\Rows;

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="col-lg-1 d-none d-lg-block border-end border-light-subtle">
    <div class="d-flex flex-column align-content-between justify-content-between pt-4 sticky-top" id="left">
        <ul class="nav flex-column nav-pills gap-0 row-gap-3">
            <?php if ($this->options->logoUrl): ?>
                <li class="nav-item d-flex justify-content-center mb-4">
                    <a class="nav-link p-0" href="<?php $this->options->siteUrl(); ?>"
                       title="<?php $this->options->title() ?>">
                        <img class="rounded" src="<?php $this->options->logoUrl() ?>"
                             loading="lazy"
                             width="50" height="50"
                             alt="<?php $this->options->title() ?>"
                        />
                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item d-flex justify-content-center position-relative">
                <a class="nav-link p-0 d-flex align-items-center justify-content-center"
                   href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>">
                    <i class="ti ti-home"></i>
                </a>
                <span class="position-absolute nav-item-title text-nowrap"><?php $this->options->title() ?></span>
            </li>
            <?php Rows::alloc()->to($pages); ?>
            <?php while ($pages->next()): ?>
                <?php if ($pages->fields->showPage): ?>
                    <li class="nav-item d-flex justify-content-center position-relative">
                        <a class="nav-link p-0 d-flex align-items-center justify-content-center"
                           href="<?php $pages->permalink() ?>" title="<?php $pages->title() ?>">
                            <i class="ti ti-<?php $pages->fields->iconPage(); ?>"></i>
                        </a>
                        <span class="position-absolute nav-item-title text-nowrap"><?php $pages->title() ?></span>
                    </li>
                <?php endif; ?>
            <?php endwhile; ?>
        </ul>
        <ul class="nav flex-column nav-pills gap-0 row-gap-3 sticky-bottom bottom-0">
            <li class="nav-item d-flex justify-content-center position-relative">
                <a class="nav-link p-0 d-flex align-items-center justify-content-center" id="bd-theme"
                   href="javascript:changeBsTheme()">
                    <i class="ti ti-sun-moon px-3 py-1 rounded"></i>
                </a>
                <span class="position-absolute nav-item-title text-nowrap">切换模式</span>
            </li>
            <li class="nav-item d-flex justify-content-center position-relative">
                <a class="nav-link p-0 d-flex align-items-center justify-content-center" href="#top">
                    <i class="ti ti-chevrons-up px-3 py-1 rounded"></i>
                </a>
                <span class="position-absolute nav-item-title text-nowrap">返回顶部</span>
            </li>
        </ul>
    </div>
</div>
