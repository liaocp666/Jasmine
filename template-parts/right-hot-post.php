<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="container-fluid p-4 mt-3 border-bottom border-light-subtle">
    <div class="row gap-2">
        <div class="col-12">
            <div class="col-12 d-flex gap-1 align-content-center">
                <i class="ti ti-chart-bar lh-base"></i>
                <h6 class="lh-base">热门文章</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="text-body-secondary" style="line-height: 32px">
                <ul class="list-group list-group-flush">
                    <?php widget\HotPost::alloc()->to($hotPosts) ?>
                    <?php while ($hotPosts->next()): ?>
                        <li class="list-group-item p-0 border-0">
                            <a href="<?php $hotPosts->permalink(); ?>"
                               title="<?php $hotPosts->title(); ?>">
                                <?php if ($hotPosts->fields->postType): ?>
                                    <?php if ('1' == $hotPosts->fields->postType): ?>
                                        <?php $hotPosts->title(); ?>
                                    <?php endif; ?>
                                    <?php if ('2' == $hotPosts->fields->postType): ?>
                                        <?php $hotPosts->excerpt(15, '');; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php $hotPosts->title(); ?>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
