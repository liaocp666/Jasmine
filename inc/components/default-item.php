<div class="content d-flex flex-column justify-content-between position-relative">
    <div class="title">
        <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
            <h2 class="fs-5" itemprop="headline">
                <?php $this->title() ?>
            </h2>
        </a>
    </div>
    <div class="excerpt" itemprop="abstract">
        <p><?php $this->excerpt(500, ''); ?></p>
    </div>
    <div class="meta d-flex justify-content-between position-relative">
        <div class="left">
            <span>
                <?php $this->category('<span class="middotDivider"></span>', true, '无'); ?>
            </span>
            <span class="middotDivider"></span>
            <span><?php echo getHumanizedDate($this->created); ?></span>
        </div>
        <span class="d-none" itemprop="author" itemscope itemtype="https://schema.org/Person">
            <meta itemprop="url" content="<?php $this->author->permalink(); ?>"/>
            <a itemprop="url" href="<?php $this->author->permalink(); ?>">
                <span itemprop="name"><?php $this->author->screenName(); ?></span>
            </a>
        </span>
    </div>
</div>
<?php if ($thumbnail = getThumbnail($this->cid, '')): ?>
    <div class="thumbnail d-none d-lg-block">
        <meta itemprop="image" content="<?php echo $thumbnail; ?>" />
        <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
            <img class="lazyload" data-original="<?php echo $thumbnail; ?>" width="170" height="130" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" alt="<?php $this->title() ?>">
        </a>
    </div>
<?php endif; ?>
