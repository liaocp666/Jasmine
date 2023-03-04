<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
if ($cids = getStickyPost()): ?>
    <div id="sticky">
        <div class="row">
            <?php foreach ($cids as $cid) : ?>
            <?php $this->widget('Widget_Archive@jasmine'.$cid, 'pageSize=1&type=post', 'cid='.$cid)->to($item); ?>
                <div class="col-ld-6 col-md-12">
                    <div class="item d-flex">
                        <div class="thumbnail">
                            <a href="<?php $item->permalink(); ?>" title="<?php $item->title(); ?>">
                                <img width="130" height="90" src="<?php echo getThumbnail($item->cid, $this->options->themeUrl . '/assets/thumbnails/1.jpg'); ?>" alt="<?php echo $post['cid'];?>">
                            </a>
                        </div>
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title py-1">
                                <a href="<?php $item->permalink(); ?>" title="<?php $this->title(); ?>">
                                    <h2 class="fs-6"><?php $item->title(); ?></h2>
                                </a>
                            </div>
                            <div class="excerpt py-1">
                                <p><?php echo $item->excerpt(500, ''); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
