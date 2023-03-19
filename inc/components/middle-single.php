<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="col-lg-8 col-md-12"
     data-prismjs-copy="点击复制"
     data-prismjs-copy-error="按Ctrl+C复制"
     data-prismjs-copy-success="文本已复制！">
    <div id="middle">
        <?php $this->need('inc/components/middle-header.php'); ?>
        <div id="article" class="mb-5">
            <div class="row">
                <div class="col-12" itemscope itemtype="https://schema.org/NewsArticle">
                    <div class="item d-flex flex-column">
                        <div class="head mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="left-head">
                                    <div class="title mb-4">
                                        <h1 class="fs-3 fw-semibold" itemprop="headline"><?php $this->title() ?></h1>
                                    </div>
                                    <div class="meta d-flex justify-content-between mb-3">
                                        <div class="left">
                                            <?php if ($this->is('post')): ?>
                                                <span>
                                                <?php $this->category('<span class="middotDivider"></span>', true, '无'); ?>
                                            </span>
                                                <span class="middotDivider"></span>
                                            <?php endif; ?>
                                            <span><?php echo getHumanizedDate($this->created); ?></span>
                                            <span class="d-none" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                                <meta itemprop="url" content="<?php $this->author->permalink(); ?>"/>
                                                <a itemprop="url" href="<?php $this->author->permalink(); ?>">
                                                    <span itemprop="name"><?php $this->author->screenName(); ?></span>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($thumbnail = getThumbnail($this->cid, '')): ?>
                                    <div class="thumbnail d-none d-lg-block">
                                        <meta itemprop="image" content="<?php echo $thumbnail; ?>" />
                                        <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                                            <img width="170" height="130" src="<?php echo $thumbnail; ?>"
                                                 alt="<?php $this->title() ?>">
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div id="content" class="mb-3 heti" itemprop="articleBody">
                            <?php $this->content(); ?>
                        </div>
                        <!--<div class="socialize m-auto mb-3">
                            <button type="button" class="btn btn-light"><i
                                    class="bi bi-hand-thumbs-up-fill"></i>&nbsp;(0)
                            </button>
                        </div>-->
                        <?php if ($this->is('post')): ?>
                            <div class="post-tags mb-3">
                                <i class="bi bi-tags-fill"></i> <?php $this->tags(', ', true, '暂无标签'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->need('comments.php'); ?>
    </div>
</div>
