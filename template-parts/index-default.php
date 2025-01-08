<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<article class="card border-0 py-3 col-12 block" itemscope="itemscope" itemtype="http://schema.org/Article">
    <div class="d-flex column-gap-2 overflow-hidden">
        <div class="card-body p-0 d-flex flex-column justify-content-between row-gap-1">
            <h3 class="card-title fs-5 fw-normal" itemprop="headline">
                <a href="<?php $this->permalink(); ?>"
                   title="<?php $this->title(); ?>"><?php $this->title(); ?></a>
            </h3>
            <p class="card-text more text-body-secondary" itemprop="about"><?php $this->excerpt(70, '...'); ?></p>
            <p class="card-text">
                <small class="text-body-tertiary"><?php $this->category(', '); ?> ·
                    <?php $this->date(); ?>
                </small>
            </p>
        </div>
        <?php if ($this->fields->thumbnail): ?>
            <a href="<?php $this->permalink(); ?>"
               class="rounded ms-auto border border-light-subtle thumbnail d-none d-lg-block"
               title="<?php $this->title(); ?>"
               style="background-image: url('<?php $this->fields->thumbnail(); ?>')"></a>
        <?php endif; ?>
    </div>
    <meta itemprop="author" content="<?php $this->author(); ?>" />
    <meta itemprop="publisher" content="<?php $this->options->title(); ?>" />
    <meta itemprop="datePublished" content="<?php $this->date('Y-m-d\TH:i:sP'); ?>" />
    <meta itemprop="dateModified" content="<?php $this->date('Y-m-d\TH:i:sP'); ?>" />
    <?php if ($this->fields->thumbnail): ?>
        <meta itemprop="image" content="<?php $this->fields->thumbnail(); ?>" />
    <?php endif; ?>
</article>
