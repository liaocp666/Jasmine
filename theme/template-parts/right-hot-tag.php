<?php

use Widget\Metas\Tag\Cloud;

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="container-fluid p-4 mt-3 border-bottom border-light-subtle">
    <div class="row gap-2">
        <div class="col-12 d-flex gap-1 align-content-center justify-content-start fw-medium">
            <i class="ti ti-tags lh-base"></i>
            <h6 class="lh-base">热门标签</h6>
        </div>
        <div class="col-12">
            <div class="text-body-secondary" style="line-height: 32px">
                <ul class="list-group flex-wrap list-group-horizontal row-gap-1 column-gap-3">
                    <?php Cloud::alloc(["ignoreZeroCount" => "1", "limit" => "17", "sort" => "count", "desc" => "1"])->to($tags) ?>
                    <?php while ($tags->next()): ?>
                        <li class="list-group-item p-0 border-0">
                            <a href="<?php $tags->permalink(); ?>"
                               title="<?php $tags->name(); ?>(<?php $tags->count(); ?>篇)">
                                <?php $tags->name(); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
