<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
if (!empty($stickyPosts = getStickyPost())) : ?>
    <div id="sticky" class="pb-4 mb-5">
        <div class="row">
            <?php foreach ($stickyPosts as $post) : ?>
                <div class="col-6 mb-5">
                    <div class="item d-flex">
                        <div class="thumbnail">
                            <a href="">
                                <img width="130" height="90" src="<?php echo getThumbnail($post['cid'], $this->options->themeUrl . '/assets/thumbnails/1.jpg'); ?>" alt="<?php echo $post['cid'];?>">
                            </a>
                        </div>
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title py-1">
                                <a href="">
                                    <h2 class="fs-6"><?php echo $post['title']; ?></h2>
                                </a>
                            </div>
                            <div class="excerpt py-1">
                                <p><?php echo getExcerpt($post['text'], 1000, '') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
