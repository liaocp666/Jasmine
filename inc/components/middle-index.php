<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="col-lg-8 col-md-12">
    <div id="middle">
        <?php $this->need('inc/components/middle-header.php'); ?>
        <?php if($this->is('index') && $this->_currentPage == 1): ?>
        <?php $this->need('inc/components/sticky.php'); ?>
        <?php endif; ?>
        <div id="article" class="mb-5">
            <div class="row">
                <?php while ($this->next()): ?>
                <div class="col-12" itemscope itemtype="https://schema.org/NewsArticle">
                    <div class="item d-flex mb-5 justify-content-between position-relative">
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
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div id="pagination" class="mb-5">
            <nav aria-label="Page navigation">
                <?php $this->pageNav('‹', '›',1,'...',array('wrapTag' => 'ul', 'wrapClass' => 'pagination justify-content-center','itemTag' => 'li','currentClass' => 'page-current',)); ?>
            </nav>
        </div>
    </div>
</div>
