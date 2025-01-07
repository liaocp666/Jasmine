<?php use Typecho\Common;

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="card border-0 py-3 col-12">
    <div class="d-flex column-gap-2 overflow-hidden">
        <div class="card-body p-0 d-flex justify-content-start row-gap-1 overflow-hidden">
            <a href="<?php $this->permalink(); ?>">
                <img src="<?php echo Common::gravatarUrl($this->author->mail, 42, 'X', 'mm', $this->request->isSecure()) ?>"
                     loading="lazy"
                     alt="<?php $this->author(); ?>" class="rounded float-start me-2">
            </a>
            <div class="d-flex flex-column row-gap-2 w-100">
                <small class="align-content-center justify-content-center">
                    <?php $this->author(); ?>&nbsp;·&nbsp;<?php $this->date(); ?>
                </small>
                <p class="card-text more p-3 rounded moment-body"><?php $this->excerpt(30, '…'); ?>&nbsp;
                    <a href="<?php $this->permalink(); ?>" class="d-inline-block"><span class="read-more"><i class="ti ti-external-link"></i></span></a>
                </p>
            </div>
        </div>
    </div>
</div>

