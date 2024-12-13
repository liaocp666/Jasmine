<?php use Typecho\Common;

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="card border-0 py-3 col-12">
    <div class="d-flex column-gap-2 overflow-hidden">
        <div class="card-body p-0 d-flex flex-column justify-content-between row-gap-1">
            <a href="<?php $this->permalink(); ?>" class="d-block overflow-hidden">
                <img src="<?php echo Common::gravatarUrl($this->author->mail, 42,'X', 'mm', $this->request->isSecure()) ?>" alt="<?php $this->author(); ?>" class="rounded float-start me-2">
                <div class="d-flex flex-column row-gap-2">
                    <small class="align-content-center justify-content-center">
                        <?php $this->author(); ?>&nbsp;·&nbsp;<?php $this->date(); ?>
                    </small>
                    <p class="card-text more bg-body-secondary p-3 rounded"><?php $this->excerpt(70, ''); ?>&nbsp;<span class="text-danger">阅读全文</span></p>
                </div>
            </a>
        </div>
    </div>
</div>

