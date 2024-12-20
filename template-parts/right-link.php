<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="container-fluid p-4 mt-3">
    <div class="row gap-2">
        <div class="col-12 d-flex gap-1 align-content-center justify-content-start fw-medium">
            <i class="ti ti-link lh-base"></i>
            <h6 class="lh-base">
                网站链接
            </h6>
        </div>
        <div class="col-12">
            <div class="text-body-secondary" style="line-height: 32px">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-0 border-0">
                        <a href="<?php $this->options->feedUrl(); ?>" title="RSS 订阅">
                            RSS 订阅
                        </a>
                    </li>
                    <li class="list-group-item p-0 border-0">
                        <a href="<?php $this->options->siteUrl(); ?>sitemap.xml" title="网站地图">
                            网站地图
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
