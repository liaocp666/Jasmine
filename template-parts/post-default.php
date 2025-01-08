<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<article class="card border-0 py-3 col-12 border-bottom border-light-subtle mb-3 pb-4" id="post-article" itemscope="itemscope" itemtype="http://schema.org/Article">
    <div class="d-flex column-gap-2">
        <div class="card-body p-0 d-flex flex-column justify-content-between row-gap-1 overflow-hidden">
            <h1 class="card-title fs-3" itemprop="headline"><?php $this->title(); ?></h1>
            <p class="card-text pb-3">
                <small class="text-body-tertiary">
                    <?php if ($this->is('post')): ?>
                        <?php $this->category(', '); ?>
                        &nbsp;·&nbsp;
                    <?php endif; ?>
                    <?php $this->date(); ?>
                    <?php $this->need('template-parts/edit.php'); ?>
                </small>
            </p>
            <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php $this->permalink(); ?>" />
            <meta itemprop="datePublished" content="<?php $this->date('Y-m-d\TH:i:sP'); ?>" />
            <meta itemprop="dateModified" content="<?php $this->date('Y-m-d\TH:i:sP'); ?>" />
            <meta itemprop="author" content="<?php $this->author(); ?>" />
            <?php if ($this->fields->thumbnail): ?>
                <meta itemprop="image" content="<?php $this->fields->thumbnail(); ?>" />
            <?php endif; ?>
            <?php $this->need('template-parts/toc.php') ?>
            <div id="post-content" class="lh-lg" itemprop="articleBody">
                <?php $this->content(); ?>
            </div>
            <?php if ($this->is('post')): ?>
                <div class="tags align-content-center py-2">
                    <i class="ti ti-tags me-2"></i>&nbsp;<?php $this->tags('、', true, ''); ?>
                </div>
                <div class="bg-auto px-3 py-3 rounded text-dark-emphasis">
                    <div class="row gap-3 gap-lg-0">
                        <div class="col-lg-6 col-md-12">
                            上一篇：<?php $this->thePrev('%s', _t('没有了')); ?>
                        </div>
                        <div class="col-lg-6 col-md-12 text-start text-lg-end">
                            下一篇：<?php $this->theNext('%s', _t('没有了')); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>