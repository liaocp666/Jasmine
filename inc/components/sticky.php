<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
if (!empty($cids = getStickyPost())) : ?>
    <div id="sticky" class="pb-4 mb-5">
        <div class="row">
            <?php foreach ($cids as $cid) : ?>
            <?php $this->widget('Widget_Archive@jasmine'.$cid, 'pageSize=1&type=post', 'cid='.$cid)->to($item); ?>
                <div class="col-6 mb-5">
                    <div class="item d-flex">
                        <div class="thumbnail">
                            <a href="">
                                <img width="130" height="90" src="<?php echo getThumbnail($item->cid, $this->options->themeUrl . '/assets/thumbnails/1.jpg'); ?>" alt="<?php echo $post['cid'];?>">
                            </a>
                        </div>
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title py-1">
                                <a href="">
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
