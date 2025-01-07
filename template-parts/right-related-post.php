<?php

use Widget\Contents\Related;

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php Related::alloc(['cid' => $this->cid, 'type' => $this->type, 'tags' => $this->tags, 'limit' => '7'])->to($relatedPosts); ?>
<?php if($relatedPosts -> have()): ?>
    <div class="container-fluid p-4 mt-3 border-bottom border-light-subtle">
        <div class="row gap-2">
            <div class="col-12 d-flex gap-1 align-content-center justify-content-start fw-medium">
                <i class="ti ti-flame lh-base"></i>
                <h6 class="lh-base">相关文章</h6>
            </div>
            <div class="col-12">
                <div class="text-body-secondary" style="line-height: 32px">
                    <ul class="list-group list-group-flush">
                        <?php while ($relatedPosts->next()): ?>
                            <li class="list-group-item p-0 border-0">
                                <a href="<?php $relatedPosts->permalink(); ?>"
                                   title="<?php $relatedPosts->title(); ?>">
                                    <?php $relatedPosts->title(); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>