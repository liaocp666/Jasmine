<?php

use Widget\Comments\Recent;

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="container-fluid p-4 mt-3 border-bottom border-light-subtle">
    <div class="row gap-2">
        <div class="col-12 d-flex gap-1 align-content-center justify-content-start fw-medium">
            <i class="ti ti-message lh-base"></i>
            <h6 class="lh-base">最新评论</h6>
        </div>
        <div class="col-12">
            <div class="text-body-tertiary" style="line-height: 32px">
                <ul class="list-group list-group-flush">
                    <?php Recent::alloc(["pageSize" => "7", "ignoreAuthor" => "1"])->to($comments); ?>
                    <?php while ($comments->next()): ?>
                        <li class="list-group-item p-0 border-0 text-truncate d-block link-secondary">
                            <a href="<?php $comments->permalink(); ?>">
                                <?php $comments->author(false); ?> : <?php $comments->excerpt(20, '...'); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
