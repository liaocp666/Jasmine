<?php

use widget\TopUpContent;

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if ($this->is('index') && $this->_currentPage == 1): ?>
    <?php TopUpContent::alloc()->to($topUpPost); ?>
    <?php while ($topUpPost->next()): ?>
        <article class="card border-0 py-3 col-12" itemscope="itemscope" itemtype="http://schema.org/Article">
            <div class="d-flex column-gap-2 overflow-hidden">
                <div class="card-body p-0 d-flex flex-column justify-content-between row-gap-1">
                    <h3 class="card-title fs-4 fw-normal" itemprop="headline">
                        <a href="<?php $topUpPost->permalink(); ?>" title="<?php $topUpPost->title(); ?>" aria-label="<?php $topUpPost->title(); ?>">
                            <?php $topUpPost->title(); ?>
                        </a>
                    </h3>
                    <p class="card-text more text-body-secondary" itemprop="about"><?php $topUpPost->excerpt(70, '...'); ?></p>
                    <p class="card-text">
                        <small class="text-body-tertiary">
                            <?php $topUpPost->category(', '); ?>
                            ·
                            <?php $topUpPost->date(); ?>
                            ·
                            <span class="top-up-flag fw-semibold">置顶</span>
                        </small>
                    </p>
                </div>
                <?php if ($topUpPost->fields->thumbnail): ?>
                    <a href="<?php $topUpPost->permalink(); ?>"
                       class="rounded ms-auto border border-light-subtle thumbnail d-none d-lg-block"
                       title="<?php $topUpPost->title(); ?>"
                       style="background-image: url('<?php $topUpPost->fields->thumbnail(); ?>')"></a>
                <?php endif; ?>
            </div>
            <meta itemprop="author" content="<?php $topUpPost->author(); ?>" />
            <meta itemprop="publisher" content="<?php $this->options->title(); ?>" />
            <meta itemprop="dateModified" content="<?php $topUpPost->date('Y-m-d\TH:i:sP'); ?>" />
            <?php if ($topUpPost->fields->thumbnail): ?>
                <meta itemprop="image" content="<?php $topUpPost->fields->thumbnail(); ?>" />
            <?php endif; ?>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
