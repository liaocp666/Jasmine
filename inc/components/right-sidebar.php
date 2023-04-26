<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="col-lg-3 d-none d-lg-block" id="right-sidebar-sticky">
    <div id="right-sidebar" class="pt-5">
        <div class="row">
            <div class="col-12 pb-4 mb-5 widget">
                <div id="blogger">
                    <div
                        class="d-flex position-relative align-content-center align-items-center align-self-center justify-content-start">
                        <div class="mt-1">
                            <img class="avatar lazyload" width="50" height="50"
                                 src="<?php echo getAvatarByMail($this->author->mail, true) ?>" alt="<?php $this->author->screenName(); ?>"
                            />
                        </div>
                        <div class="blogger ms-3">
                            <div class="name">
                                <p class="my-1"><?php $this->author->screenName() ?></p>
                            </div>
                            <div class="recommend">
                                <p class="my-1"><?php $this->options->authorRecommend(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 pb-5 mb-5 widget">
                <div id="hot-posts">
                    <div class="title mb-3">
                        <h3 class="fs-6"><i class="bi bi-bar-chart-line-fill"></i>&nbsp;热门文章</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php $posts = getHotPosts(); ?>
                        <?php if(!empty($posts)): ?>
                        <?php foreach ($posts as $post): ?>
                        <li class="list-group-item">
                            <a href="<?php echo $post['permalink']; ?>" title="<?php echo $post['title']; ?>"><?php echo $post['title']; ?></a>
                        </li>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-12 pb-5 mb-5 widget">
                <div id="hot-comments">
                    <div class="title mb-3">
                        <h3 class="fs-6"><i class="bi bi-chat-square-heart-fill"></i>&nbsp;最新评论
                        </h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php $this->widget('Widget_Comments_Recent', array())->to($newComments); ?>
                        <?php if($newComments->have()): ?>
                            <?php while($newComments->next()): ?>
                                <li class="list-group-item">
                                    <a href="<?php $newComments->permalink(); ?>" title="<?php $newComments->excerpt(35, '...'); ?>"><?php echo $newComments->author; ?>: <?php $newComments->excerpt(35, '...'); ?></a>
                                </li>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <li class="list-group-item">
                                <a href="">暂无回复</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-12 pb-5 mb-5 widget">
                <div id="hot-tags">
                    <div class="title mb-3">
                        <h3 class="fs-6"><i class="bi bi-bookmark-heart-fill"></i>&nbsp;热门标签
                        </h3>
                    </div>
                    <ul class="nav nav-pills">
                        <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=15')->to($tags); ?>
                        <?php if($tags->have()): ?>
                        <?php while ($tags->next()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php $tags->permalink(); ?>" title="<?php $tags->name(); ?>"><?php $tags->name(); ?></a>
                        </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
