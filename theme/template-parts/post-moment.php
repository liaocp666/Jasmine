<?php use Typecho\Common;

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="card border-0 py-3 col-12 border-bottom border-light-subtle mb-3 pb-4">
    <div class="d-flex column-gap-2">
        <div class="card-body p-0 d-flex flex-column justify-content-between row-gap-1 overflow-hidden">
            <div class="d-block overflow-hidden">
                <img src="<?php echo Common::gravatarUrl($this->author->mail, 42,'X', 'mm', $this->request->isSecure()) ?>"
                     loading="lazy"
                     alt="<?php $this->author(); ?>" class="rounded float-start me-2">
                <div class="d-flex flex-column row-gap-2">
                    <small class="align-content-center justify-content-center">
                        <?php $this->author(); ?>&nbsp;·&nbsp;<?php $this->date(); ?>
                    </small>
                    <div class="card-text more moment-body p-3 rounded" id="post-content"><?php $this->content(); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>